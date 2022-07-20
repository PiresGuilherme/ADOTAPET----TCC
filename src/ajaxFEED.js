// $(document).ready(function(){
//     $('.post-image[data-img!=""]').each(function (index,elem){
//         $(elem).css('backgroung', 'url('+$(elem).data('img')+')');
//     });
// })



$(function(){
    $("#pesquisa").ready(function(){
        var pesquisa = $(this).val();

        if (pesquisa!= ''){
            var dados = {
                palavra : pesquisa
        }
            $.post('dash.php', dados)
        }
    });
})