<?php
/* For licensing terms, see /license.txt */
/**
	*	@package chamilo.admin
*/
/**
* Code
*/
// Resetting the course id.
$cidReset = true;
// Including some necessary dokeos files.
require_once '../inc/global.inc.php';
// Setting the section (for the tabs).
$this_section = SECTION_PLATFORM_ADMIN;
// Access restrictions.
api_protect_admin_script();
// Displaying the header.
Display :: display_header($tool_name);
?>

<div class="row">
          <div class="col-sm-4">
          	<div class="form-group">
              <label for="sel1">Curso:</label>
              <select class="form-control" id="selCurso">
                <option>Matemática 1</option>
                <option>Física 1</option>
                <option>Química Orgánica</option>
                
              </select>
            </div>

              
              <!-- START list group-->
              <div class="list-group"> 
                <!-- START list group item--> 
                <a href="javascript:void(0);" class="list-group-item">
                <div class="media">
                  <div class="pull-left"> <input type="checkbox"></div>
                  <div class="media-body clearfix"> <small class="pull-right">4 Marzo 3:00 pm</small>
                    <div class="media-heading text-green m0">¿Cras sit amet nibh libero, in gravida nulla. Nulla...? </div>
                    <p class="mb-sm"> <small>¿Cras sit amet nibh libero, in gravida nulla. Nulla...?</small> </p>
                    <strong class="media-heading text-primary"> De Peter Parker</strong> </div>
                </div>
                </a>
                <a href="javascript:void(0);" class="list-group-item">
                <div class="media">
                  <div class="pull-left"> <input type="checkbox"></div>
                  <div class="media-body clearfix"> <small class="pull-right">4 Marzo 3:00 pm</small>
                    <div class="media-heading text-green m0">¿Cras sit amet nibh libero, in gravida nulla. Nulla...? </div>
                    <p class="mb-sm"> <small>¿Cras sit amet nibh libero, in gravida nulla. Nulla...?</small> </p>
                    <strong class="media-heading text-primary"> De Peter Parker</strong> </div>
                </div>
                </a>
                <!-- END list group item--> 
                
                <!-- START list group item--> 
                <a href="javascript:void(0);" class="list-group-item">
                <div class="media">
                  <div class="pull-left"> <input type="checkbox"></div>
                  <div class="media-body clearfix"> <small class="pull-right">4 Marzo 3:00 pm</small>
                    <div class="media-heading text-green m0">¿Cras sit amet nibh libero, in gravida nulla. Nulla...? </div>
                    <p class="mb-sm"> <small>¿Cras sit amet nibh libero, in gravida nulla. Nulla...?</small> </p>
                    <strong class="media-heading text-primary"> De Peter Parker</strong> </div>
                </div>
                </a>
                <a href="javascript:void(0);" class="list-group-item">
                <div class="media">
                  <div class="pull-left"> <input type="checkbox"></div>
                  <div class="media-body clearfix"> <small class="pull-right">4 Marzo 3:00 pm</small>
                    <div class="media-heading text-green m0">¿Cras sit amet nibh libero, in gravida nulla. Nulla...? </div>
                    <p class="mb-sm"> <small>¿Cras sit amet nibh libero, in gravida nulla. Nulla...?</small> </p>
                    <strong class="media-heading text-primary"> De Peter Parker</strong> </div>
                </div>
                </a>
                <!-- END list group item--> 
                
                
              </div>
              <!-- END list group--> 
            </div>
        
          <div class="col-sm-8">
            <h3>Tema de la pregunta</h3>
            <p>Pellentesque libero nisi, lobortis vitae aliquam at, euismod vitae orci. Nunc commodo mi nec sagittis lacinia. Sed in justo est. Integer eget nisl sapien. Etiam ullamcorper justo nisi, et sagittis arcu sollicitudin id.Pellentesque libero nisi, lobortis vitae aliquam at, euismod vitae orci. Nunc commodo mi nec sagittis lacinia. Sed in justo est. Integer eget nisl sapien. Etiam ullamcorper justo nisi, et sagittis arcu sollicitudin id.</p>
            <ul class="list-group enlinea">
              <li class="list-group-item"><a href="#"><i class="fa fa-picture-o"></i> Archivo1.ppt</a></li>
              <li class="list-group-item"><a href="#"><i class="fa fa-picture-o"></i> Archivo2.ppt</a></li>
            </ul>
            <div class="respuesta">
              <div class="form-group">
                <label for="selPreguntaTutor">Respuesta de:</label>
                <select class="form-control" id="selPreguntaTutor">
                  <option selected>Bruno Díaz</option>
                  <option>Ricardo Tapia</option>
                  <option>Natasha Romanova</option>
                  <option>Peter Parker</option>
                </select>
              </div>
              <p>Pellentesque libero nisi, lobortis vitae aliquam at, euismod vitae orci. Nunc commodo mi nec sagittis lacinia. Sed in justo est. Integer eget nisl sapien. Etiam ullamcorper justo nisi, et sagittis arcu sollicitudin id. Curabitur sed pretium enim. Nulla ac pharetra tellus. Praesent pharetra ante quis rhoncus euismod.</p>
              <ul class="list-group enlinea">
                <li class="list-group-item"><a href="#"><i class="fa fa-picture-o"></i> Archivo1.ppt</a></li>
                <li class="list-group-item"><a href="#"><i class="fa fa-picture-o"></i> Archivo2.ppt</a></li>
              </ul>
              <div>Ha sido útil <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> Recomendar<i class="fa fa-share-alt"></i> </div>
            </div><!-- respuesta -->
          </div>
</div>


<?php>

// Displaying the footer.
Display :: display_footer();
?>