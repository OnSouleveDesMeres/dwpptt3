$(document).ready(function() {
    $("#searchbar").focus().keyup(function (event) {
        var input = $(this);
        var val = input.val();
        var temp = '';
        for(var i in val){
            temp += val[i]+'(.*)';
        }
        var regexp = '\\b(.*)'+temp+'\\b';
        $('#groupcards div div').show();
        $('#groupcards div div div div div').find('p').each(function () {
            var p = $(this);
            var results = p.text().match(new RegExp(regexp, "i"));
            if(!results){
                p.parent().parent().parent().parent().hide();
            }
            else {
                p.parent().parent().parent().parent().show();
            }
        });

    });
});