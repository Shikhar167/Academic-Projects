<div id="demo-modal-target">
    <div class="demo-title">Bootstrap Dynamic Modal Window</div>
    <div onclick="loadDynamicContentModal('bootstrap')"
        class="btn-modal-target" id="btn-bootstrap">Bootstrap</div>
    <div onclick="loadDynamicContentModal('jquery')"
        class="btn-modal-target" id="btn-jquery">jQuery</div>
    <div onclick="loadDynamicContentModal('responsive')"
        class="btn-modal-target" id="btn-responsive">Responsive</div>
</div>

<div class="modal fade" id="bootstrap-modal" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Bootstrap Dynamic Modal
                    Content</h4>
            </div>
            <div id="demo-modal"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
	function loadDynamicContentModal(modal) {
		var options = {
			modal : true,
			height : 300,
			width : 500
		};
		$('#demo-modal').load('get-dynamic-data.php?modal=' + modal,
				function() {
					$('#bootstrap-modal').modal({
						show : true
					});
				});
	}
</script>

<?php
require ("DBController.php");
$dbController = new DBController();
$query = "SELECT * FROM tbl_modal_content WHERE modal = '" . $_GET["modal"] . "'";
$result = $dbController->runQuery($query);
if(!empty($result)) 
{
?>
<img src='<?php echo $result[0]["image"]?>' />
<div class='modal-text'>
    <?php echo $result[0]["modal_content"]?>
</div>
<?php 
    }
?>