$(document).ready(function (){
   $('#input').keyup(function (){
       let input = $(this).val();
       $.ajax({
              url: '/product_search',
              method: 'GET',
              data: {input: input},
              success: function (data){
                    search_items_autocomplete(data);
              }
         });
   });
});

function search_items_autocomplete(data){
    $( "#input" ).autocomplete({
        source: data
    });
}

