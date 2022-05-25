const PATH_HTTP_ROOT = $('#a-link-to-top').attr('href');

$('#a-resend-validation-mail').on('click', e => {
    const url = PATH_HTTP_ROOT + 'validate_mail/resend.php';
    $.get(url).done(d => {
        alert(d);
    });
});

type PostElement = {
    postContainer: HTMLElement | null;
    postId: string;
};

const getPostElement = (element: HTMLElement): PostElement => {
    const postContainer = element.closest('.post-container') as HTMLElement;
    var postId = '-1'
    if (postContainer !== null) {
        const dataset = postContainer.dataset;
        if ('postId' in dataset && dataset.postId !== undefined){
            postId = dataset.postId;
        }
    }

    return {
        postContainer: postContainer,
        postId: postId,
    };
};

const divPopupPostParentPost = $('#div-popup-post-parent-post');
const inputPostId = $('#input-post-id');
const textareaPostContent = $('#textarea-post_content');
const postSend = $('.post-send');
const postEdit = $('.post-edit');
const formPost = $('#form-post');

var isNewPost = true;

postSend.on('click', e => {
    const postElement = getPostElement(e.target);

    divPopupPostParentPost.html('');
    if (postElement.postContainer !== null) {
        const postMain = postElement.postContainer.getElementsByClassName('post-main')[0] as HTMLElement;
        divPopupPostParentPost.html(postMain.outerHTML);
    }

    inputPostId.val(postElement.postId);

    isNewPost = true;
});
(postSend as any).magnificPopup({
    type: "inline"
});

postEdit.on('click', e => {
    const postElement = getPostElement(e.target);

    textareaPostContent.val('');
    if (postElement.postContainer !== null) {
        const postContent = postElement.postContainer.getElementsByClassName('post-content')[0] as HTMLElement;
        textareaPostContent.val(postContent.outerText);
    }

    inputPostId.val(postElement.postId);

    isNewPost = false;
});
(postEdit as any).magnificPopup({
    type: "inline"
});

$('#button-post').on('click', e => {
    const url = PATH_HTTP_ROOT + `post/${isNewPost ? 'send' : 'edit'}.php`;
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

$('.post-pw').on('click', e => {
    var count = 1;

    const postElement = getPostElement(e.target);

    const url = PATH_HTTP_ROOT + 'post/pw.php';
    const query = `post_id=${postElement.postId}&count=${count}`;
    $.post(url, query).done(d => {
        if (d) {
            alert(d);
        }
        else if (postElement.postContainer !== null) {
            const postPWCount = postElement.postContainer.getElementsByClassName('post-pw-count')[0] as HTMLElement;
            postPWCount.innerText = String(Number(postPWCount.innerHTML) + count);
        }
    });
});

$('.post-delete').on('click', e => {
    const postElement = getPostElement(e.target);

    const url = PATH_HTTP_ROOT + 'post/delete.php';
    const query = `post_id=${postElement.postId}`;
    $.post(url, query).done(d => {
        if (d) {
            alert(d);
        }
        else {
            location.reload();
        }
    });
});
