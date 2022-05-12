$('#a_resend_validation_mail').on('click', e => {
    $.get('../../../validate_mail/resend.php');
});

const input_post_id = $('#input_post_id');
$('.a_post').on('click', e => {
    const id = e.target.id;
    input_post_id.val(id);
    (e.target as any).magnificPopup({
        type: "inline"
    });
});

const form_post = $('#form_post');
$('#button_post').on('click', e => {
    const query = form_post.serialize();
    $.post('../../../post/send.php', query);
});