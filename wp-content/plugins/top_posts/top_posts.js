jQuery(document).ready( function ($) {
    $("div.top_posts").mouseover( function () {
        var div = $(this);

        $.post('wp-admin/admin-ajax.php', {
            action: "top_comments",
            post_id: $(this).find("a").attr("id")
        }, function (data) {
            div.append($(data));
        });
        return false;
    });

    $("div.top_posts").mouseout( function () {
        $("#post").remove();
    });
});


