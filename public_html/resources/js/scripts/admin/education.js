/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   
  function removecategory( key ){
            swal({
            title: 'Delete?',
            showCancelButton: true,
            confirmButtonText: 'Yes delete',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/education/removecategory',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              });
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
             
            }
      
  function removetypes( key ){
          swal({
            title: 'Delete',
            showCancelButton: true,
            confirmButtonText: 'Yes delete',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                  $.ajax({
                        url: 'http://greenapp.co.tz/admin/education/removetypes',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                                resolve( result );
                            window.document.location.href = document.URL;
                        },
                        error: function(xhr){
                           resolve( xhr.statusText );
                        }
                    });
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: result.value
              });
            }
          });
      }
      
    function removevideo( key ){        
        swal({
            title: 'Delete',
            showCancelButton: true,
            confirmButtonText: 'Yes delete',
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return new Promise((resolve) => {
                     $.ajax({
                        url: 'http://greenapp.co.tz/admin/education/removevideo',
                        type: 'post',
                        data: {'key' : key},
                        success: function( result ){
                            resolve( result )
                            window.document.location.href = 'http://greenapp.co.tz/admin/education/videos';
                        },
                        error: function(xhr){
                            resolve( xhr.statusText )
                        }
                    });
              })
            },
            allowOutsideClick: () => !swal.isLoading()
          }).then((result) => {
            if (result.value) {
              swal({
                type: 'success',
                title: 'deleted'
              })
            }
          });                   
        }