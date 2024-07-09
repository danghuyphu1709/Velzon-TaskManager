$(document).ready(function() {
    // space
    var modalCreateSpace = $('#createboardModal');
    var createSpace = modalCreateSpace.find('#createboardForm');

    var security = modalCreateSpace.find('#security');
    var defaultSecurity = security.find('#defaultSecurity')
    deleteOptionDefault(security,defaultSecurity);

    // table
    var modalCreateTable = $('#createTableModal');
    var createTable = modalCreateTable.find('#createTableForm');
    // deleted space;
    var table = modalCreateTable.find('#space');
    var elementRemove = table.find('#defaultSpace')
    deleteOptionDefault(table,elementRemove);

    function deleteOptionDefault(element,elementRemove){
        element.on('change',function (){
            if($(this).val() !== 0){
                elementRemove.remove();
            }
        })
    }


    createSpace.on('submit',function (e){
        e.preventDefault();
        let name = modalCreateSpace.find('#name');
        let validator = true;

        if(name.val() == ''){
            validator = false;
            name.addClass('blurRed')
        }else{
            name.removeClass('blurRed')
        }

        if(security.val() == 0){
            validator = false;
            security.addClass('blurRed')
        }else{
            security.removeClass('blurRed')
        }

        if (validator){
            $(this)[0].submit();
        }

    })

    createTable.on('submit',function (e){
        e.preventDefault();
        let name = modalCreateTable.find('.name');
        let validator = true;
        if(name.val() == ''){
            validator = false;
            name.addClass('blurRed')
        }else{
            name.removeClass('blurRed')
        }

        if(table.val() == 0){
            validator = false;
            table.addClass('blurRed')
        }else{
            table.removeClass('blurRed')
        }

        if (validator){
            $(this)[0].submit();
        }
    })
});
