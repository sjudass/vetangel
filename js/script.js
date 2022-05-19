$(document).ready(function() {
    $('#fullpage').fullpage({
        anchors: ['block1', 'block2', 'block3', 'block4', 'block5'],
        menu: '#menu',
        css3: true,
        scrollingSpeed: 1000
    });

    $('#contactForm').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "/main/createApplication",
            data:
                $(this).serialize(),
            cache: false,
            processData: false,
            success: function (result){
                let data = JSON.parse(result),
                    formResult = $("#form-result");

                if (data){
                    formResult.text(data.text);
                    formResult.addClass(data.className)
                } else {
                    formResult.text("Не удалось создать заявку на приём");
                    formResult.addClass("text-danger")
                }

                formResult.show('slow');
                setTimeout(function() { formResult.hide('slow'); }, 5000);
            },
            error: function () {
                alert("Что-то пошло не так")
            },
            complete: function () {
                $('#contactForm')[0].reset();
            }
        });
    });
});
