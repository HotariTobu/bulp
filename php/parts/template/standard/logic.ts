const PATH_HTTP_ROOT = `${window.location.protocol}//${window.location.hostname}/bulp/`;

$('#a-resend-validation-mail').on('click', e => {
    const url = PATH_HTTP_ROOT + 'validate_mail/resend.php';
    $.get(url).done(d => {
        alert(d);
    });
});

const divPopupPostParentPost = $('#div-popup-post-parent-post');
const inputPostId = $('#input-post-id');
const aPost = $('.a-post')
const formPost = $('#form-post');

aPost.on('click', e => {
    const id = e.target.id;
    
    const url = PATH_HTTP_ROOT + 'post';
    const query = { id: id };
    $.get(url, query).done(d => {
        divPopupPostParentPost.html(d);

        const height = divPopupPostParentPost.height();
        if (height !== undefined) {
            formPost.css('height', `${300 - height}px`);
        }
    });

    inputPostId.val(id);
});
(aPost as any).magnificPopup({
    type: "inline"
});

$('#button-post').on('click', e => {
    const url = PATH_HTTP_ROOT + 'post/send.php';
    const query = formPost.serialize();
    $.post(url, query).done(d => {
        if (d) {
            alert(d);
        }
        else {
            location.reload();
        }
    });
});

$('#button-cancel-post').on('click', e => {
    e.preventDefault();
    ($ as any).magnificPopup.close();
});