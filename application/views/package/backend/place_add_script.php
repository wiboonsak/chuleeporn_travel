
<script type="text/javascript">
    $(document).ready(function () {
	loadSeason();
        // Default Datatable
        $('#table2').DataTable({
    "order": false,
    "search" : false
});
    });
     function Add() {
        var name = $('#snameen').val();
        var nameth = $('#snameth').val();
        var currentID = $('#currentID').val();
        if (name == '') {
            swal(
                    {
                        title: 'Please enter  Place English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if (nameth == '') {
            swal(
                    {
                        title: 'Please enter  Place Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
            //---------------------------------------------
            var postData = new FormData($("#placeForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('PackageCMS/addplace') ?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status) {
                    //console.log(data);
                    $('#currentID').val(data);
                    //console.log('data->' + data + '  status->' + status);
                    if (status == 'success') {
                        swal({
                            title: 'Successfully saved.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                           loadSeason();
                    } else {
                        swal({
                            title: 'Can not be saved.!',
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
                }
            });
        }
    }
    //----------------------------------
   function  loadSeason() {
        $.post('<?php echo base_url('PackageCMS/loadPlace') ?>', {}, function (data) {
            $('#showSeason').html(data);
        });
    }
     //----------------------
	function delete_data(dataID,table){  
		swal({
           title: 'Delete?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'Delete' 
        }).then(function () {
		   $.post('<?php echo base_url('PackageCMS/deleteData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'Data was deleted successfully.',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                       loadSeason();
				}else{
					swal({
						title: 'Cannot delete data!',
						//text: "You won't be able to revert this!",
						type: 'warning',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})
				}
			})
		})
	} 
         //---------------------------------------
    function updateThis(dataID) {
        var name = $('#nameen' + dataID).val(); 
        var nameth = $('#nameth' + dataID).val(); 
        if (name == '') {
            swal(
                    {
                        title: '	Please enter Place English!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
    }else if (nameth == '') {
            swal(
                    {
                        title: '	Please enter Place Thai!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            );
        } else {
            swal({
                title: 'Edit data?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Edit data'
            }).then(function () {
                $.post('<?php echo base_url('PackageCMS/updateThis2') ?>', {name: name,nameth:nameth, currentID: dataID}, function (data) {
                    if (data > 0) {
                        $('#name').val('');
                        swal({
                            title: 'Edit data successfully.',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        })
                           loadSeason();
                    } else {
                        swal({
                            title: 'Can not be edited!',
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'

                        })
                    }
                })
            });
        }
    }
       
    
</script>	
</body>
</html>
