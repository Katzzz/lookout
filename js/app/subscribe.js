$(document).ready(function () {
    $('#formSubscribe').validate({
        submitHandler: function (form) {
            var data = $(form).serializeArray().reduce(function (obj, item) {
                if (obj[item.name]) {
                    if ($.isArray(obj[item.name])) {
                        obj[item.name].push(item.value);
                    } else {
                        var previousValue = obj[item.name];
                        obj[item.name] = [previousValue, item.value];
                    }
                } else {
                    obj[item.name] = item.value;
                }

                return obj;
            }, {});
            console.log('data', data);
            $.post('php/sendsubscribe.php', data, function (res) {
                if (res.status) {
                    alert('Successfull subscribe!');
                }
            });
        },
        errorElement: 'div',
        errorClass: 'form-error',
        errorPlacement: function (error, element) {
            if (element.parent('.absolute-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
});