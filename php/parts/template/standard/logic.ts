const PATH_HTTP_ROOT = `${window.location.protocol}//${window.location.hostname}/bulp/`;

$('#a_resend_validation_mail').on('click', e => {
    const url = PATH_HTTP_ROOT + 'validate_mail/resend.php';
    $.get(url);
});

const divPopupPost = $('#div-popup-post');
const div_popup_post_parent_post = $('#div_popup_post_parent_post');
const input_post_id = $('#input_post_id');
const a_post = $('.a_post')
a_post.on('click', e => {
    const id = e.target.id;
    
    const url = PATH_HTTP_ROOT + 'post';
    const query = { id: id };
    $.get(url, query).done(d => {
        div_popup_post_parent_post.html(d);

        const height = div_popup_post_parent_post.height();
        if (height !== undefined) {
            divPopupPost.css('height', `${height + 200}px`);
        }
    });

    input_post_id.val(id);
});
(a_post as any).magnificPopup({
    type: "inline"
});

const form_post = $('#form_post');
$('#button_post').on('click', e => {
    const url = PATH_HTTP_ROOT + 'post/send.php';
    const query = form_post.serialize();
    $.post(url, query).done(d => {
        if (d) {
            alert(d);
        }
        else {
            location.reload();
        }
    });
});