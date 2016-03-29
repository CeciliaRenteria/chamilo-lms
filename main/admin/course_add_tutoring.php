<?php
/* For licensing terms, see /license.txt */

/**
 *	@package chamilo.admin
 */
$cidReset = true;
require_once '../inc/global.inc.php';
$this_section = SECTION_PLATFORM_ADMIN;

api_protect_admin_script();

$tool_name = get_lang('AddCourse');
$interbreadcrumb[] = array('url' => 'index.php', 'name' => get_lang('PlatformAdmin'));
$interbreadcrumb[] = array('url' => 'course_list.php', 'name' => get_lang('CourseList'));


// Get all possible teachers.
$order_clause = api_sort_by_first_name() ? ' ORDER BY firstname, lastname' : ' ORDER BY lastname, firstname';
$table_user = Database :: get_main_table(TABLE_MAIN_USER);
$sql = "SELECT user_id,lastname,firstname
        FROM $table_user
        WHERE status=1".$order_clause;
// Filtering teachers when creating a course.
if (api_is_multiple_url_enabled()) {
    $access_url_rel_user_table= Database :: get_main_table(TABLE_MAIN_ACCESS_URL_REL_USER);
    $sql = "SELECT u.user_id,lastname,firstname
            FROM $table_user as u
            INNER JOIN $access_url_rel_user_table url_rel_user
            ON (u.user_id=url_rel_user.user_id)
            WHERE url_rel_user.access_url_id=".api_get_current_access_url_id()." AND status=1".$order_clause;
}
+
$res = Database::query($sql);
$teachers = array();
while ($obj = Database::fetch_object($res)) {
    $teachers[$obj->user_id] = api_get_person_name($obj->firstname, $obj->lastname);
}

// Build the form.
$form = new FormValidator('update_course');
$form->addElement('header', $tool_name);

// Title
$form->addText('title', get_lang('CourseName'), true);
$form->applyFilter('title', 'html_filter');
$form->applyFilter('title', 'trim');

// Descripción
$form->addText('description', 'Descripción', false);
$form->applyFilter('description', 'html_filter');
$form->applyFilter('description', 'trim');

// Code
$form->addText(
    'visual_code',
    array(
        get_lang('CourseCode'),
        get_lang('OnlyLettersAndNumbers')
    ),
    false,
    [
        'maxlength' => CourseManager::MAX_COURSE_LENGTH_CODE,
        'pattern' => '[a-zA-Z0-9]+',
        'title' => get_lang('OnlyLettersAndNumbers')
    ]
);

$form->applyFilter('visual_code', 'api_strtoupper');
$form->applyFilter('visual_code', 'html_filter');
$form->addRule('visual_code', get_lang('Max'), 'maxlength', CourseManager::MAX_COURSE_LENGTH_CODE);

$form->addElement(
    'select',
    'course_teachers',
    get_lang('CourseTeachers'),
    $teachers,
    [
        'id' => 'course_teachers',
        'multiple' => 'multiple'
    ]
);
$form->applyFilter('course_teachers', 'html_filter');

// Category code
$url = api_get_path(WEB_AJAX_PATH).'course.ajax.php?a=search_category';

$form->addElement(
    'select_ajax',
    'category_code',
    get_lang('CourseFaculty'),
    null,
    array(
        'url' => $url
    //    'formatResult' => 'function(item) { return item.name + "'" +item.code; }'
    )
);

// Course department
$form->addText('department_name', 'Área del curso', false, array ('size' => '60'));
$form->applyFilter('department_name', 'html_filter');
$form->applyFilter('department_name', 'trim');

$form->add_progress_bar();
$form->addButtonCreate(get_lang('CreateCourse'));

// Set some default values.
/*$values['course_language'] = api_get_setting('platformLanguage');
$values['disk_quota'] = round(api_get_setting('default_document_quotum')/1024/1024, 1);
*/
/*$default_course_visibility = api_get_setting('courses_default_creation_visibility');

if (isset($default_course_visibility)) {
    $values['visibility'] = api_get_setting('courses_default_creation_visibility');
} else {
    $values['visibility'] = COURSE_VISIBILITY_OPEN_PLATFORM;
}
$values['subscribe'] = 1;
$values['unsubscribe'] = 0;
$values['course_teachers'] = array(api_get_user_id());*/

$form->setDefaults($values);

// Validate the form
if ($form->validate()) {
    $course = $form->exportValues();

    $course_teachers = isset($course['course_teachers']) ? $course['course_teachers'] : null;
    $course['exemplary_content'] = empty($course['exemplary_content']) ? false : true;
    $course['teachers'] = $course_teachers;
    $course['course_description'] = $description;
    $course['wanted_code'] = $course['visual_code'];
    $course['gradebook_model_id']   = isset($course['gradebook_model_id']) ? $course['gradebook_model_id'] : null;
    // Fixing category code
    $course['course_category'] = $course['category_code'];
    $course_info = CourseManager::create_course($course);

    header('Location: course_list.php'.($course_info===false?'?action=show_msg&warn='.api_get_last_failure():''));
    exit;
}

// Display the form.
$content = $form->return_form();

$tpl = new Template($tool_name);
$tpl->assign('content', $content);
$tpl->display_one_col_template();
