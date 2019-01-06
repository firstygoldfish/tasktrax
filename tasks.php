<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="tasktrax.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="row">
        <section class="content">
            <h1>Table Filter</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
                                <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
                                <button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
                                <button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
                            </div>
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                    <tr data-status="pagado">
                                        <td>
                                            <div class="ckbox">
                                                <input type="checkbox" id="checkbox1">
                                                <label for="checkbox1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="star"> <i class="glyphicon glyphicon-fire"></i> </a>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left"> </a>
                                                <div class="media-body">
                                                    <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                    <h4 class="title">
														Lorem Impsum <span class="pull-right pagado">(Pagado)</span> </h4>
                                                    <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>                                 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
		$(document).ready(function () {
			$('.star').on('click', function () {
			  $(this).toggleClass('star-checked');
			});
			$('.ckbox label').on('click', function () {
			  $(this).parents('tr').toggleClass('selected');
			});
			$('.btn-filter').on('click', function () {
			  var $target = $(this).data('target');
			  if ($target != 'all') {
				$('.table tr').css('display', 'none');
				$('.table tr[data-status="' + $target + '"]').fadeIn('slow');
			  } else {
				$('.table tr').css('display', 'none').fadeIn('slow');
			  }
			});
		 });
		</script>
    </div>
</div>
