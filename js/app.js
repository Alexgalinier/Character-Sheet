$(function() {
    new app.AppView();
});

function defaultRender(view) {
    var focusId = view.$('input:focus').attr('id');
            
    $(view.el).html(view.template(view.model.toJSON()));

    if (focusId != undefined) {
        $('#' + focusId).focus();
    }

    return view;
}

function defaultGetData(view) {
    var data = {},
        key, value;
    
    view.$(':input').each(function(index, item) {
        key = $(item).attr('id');
        value = $(item).val();
        
        if ($(item).is(':checkbox')) {
            data[key] = $(item).is(':checked') ? 1 : 0;
        } else {
            data[key] = value;
        }
    });
    
    return data;
}