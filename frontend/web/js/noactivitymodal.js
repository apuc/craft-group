class NoActivityModal {



    showModal(time,elem) {

        var activity = false;


        $(document).click(function () {
            activity = true;
        });

        setTimeout(function () {

            console.log(activity);
            if(!activity)
            {
                console.log($(this).className);
                elem.fancybox().trigger("click");
            }

        },time);
    }

}
