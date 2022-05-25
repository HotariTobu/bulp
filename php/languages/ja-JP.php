<?php

const APPLICATION_NAME = '掲示板『パワー』';


const TITLE_TOP = 'トップ';
const TITLE_USER = 'ユーザー';
const TITLE_EDIT_USER = 'ユーザー編集';
const TITLE_LOGIN = 'ログイン';
const TITLE_SIGNUP = 'サインアップ';
const TITLE_VALIDATE_MAIL = 'メールアドレス検証';
const TITLE_POST = '投稿';
const TITLE_CHANGE_PASSWORD = 'パスワード変更';


const ACTION_POST = '投稿する';
const ACTION_CANCEL = 'キャンセル';
const ACTION_EDIT = '編集する';
const ACTION_LOGIN = 'ログインする';
const ACTION_SIGNUP = 'サインアップする';
const ACTION_LOGOUT = 'ログアウトする';
const ACTION_RESIGN = '退会する';
const ACTION_DELETE = '削除する';
const ACTION_CHANGE_PASSWORD = 'パスワードを変更する';
const ACTION_POWER_WORD = 'パワーワードすぎるね';
const ACTION_REPLY = 'リプライ';

const LINK_TOP = 'トップへ';
const LINK_USER = 'ユーザーページへ';
const LINK_HEAR = 'こちら';


const SUBMIT_VALUE_EDIT = '編集';
const SUBMIT_VALUE_LOGIN = 'ログイン';
const SUBMIT_VALUE_SIGNUP = 'サインアップ';
const SUBMIT_VALUE_CHANGE_PASSWORD = 'パスワードを変更する';

const LABEL_IMAGE = '画像';
const LABEL_NICKNAME = 'ニックネーム';
const LABEL_NOTE = 'ノート';
const LABEL_EMAIL = 'e-mail';
const LABEL_PASSWORD = 'パスワード';
const LABEL_CURRENT_PASSWORD = '現在のパスワード';
const LABEL_NEW_PASSWORD = '新しいパスワード';
const LABEL_RETYPE_PASSWORD = '再入力パスワード';

const PLACEHOLDER_EMAIL = 'ログイン時に使用するメールアドレス';
const PLACEHOLDER_PASSWORD = 'ログイン時に使用するパスワード';
const PLACEHOLDER_NICKNAME = '投稿に表示される好きなニックネーム';
const PLACEHOLDER_CURRENT_PASSWORD = '現在ログインに使用されているパスワード';
const PLACEHOLDER_NEW_PASSWORD = '今後ログインに使用するパスワード';
const PLACEHOLDER_RETYPE_PASSWORD = '間違い防止のためパスワードを再入力してください';


const MESSAGE_WELCOME = 'ようこそ！';
const MESSAGE_WHEN_NOT_HAVE_VALIDATION_MAIL = 'メールアドレスの検証メールが届いていない場合は';
const MESSAGE_SENT_VALIDATION_MAIL = 'メールアドレスの検証メールを送信しました。';
const MESSAGE_SUCCEED_IN_VALIDATING_MAIL = 'メールアドレスの検証に成功しました。';
const MESSAGE_CHANGED_PASSWORD = 'パスワードを変更しました。';
const MESSAGE_EDITED_USER_INFO = 'ユーザー情報を編集しました。';
const MESSAGE_EDITED_POST = '投稿を編集しました。';
const MESSAGE_DELETED_POST = '投稿を削除しました。';
const MESSAGE_RESIGNED = '退会しました。';

const ERROR_MESSAGE_CONNECT_DATABASE = 'データベースに接続できませんでした。';
const ERROR_MESSAGE_GET_ID = 'IDを取得できませんでした。';
const ERROR_MESSAGE_GET_POSTS = '投稿を取得できませんでした。';
const ERROR_MESSAGE_NO_POSTS = '投稿がありませんでした。';
const ERROR_MESSAGE_GET_USER_INFO = 'ユーザー情報を取得できませんでした。';
const ERROR_MESSAGE_NO_USER_INFO = 'ユーザー情報がありませんでした。';
const ERROR_MESSAGE_RESIZE_IMAGE = '画像をリサイズできませんでした。';
const ERROR_MESSAGE_GET_IMAGE_INFO = '画像に関する情報を取得できませんでした。';
const ERROR_MESSAGE_EDIT_USER = 'ユーザー情報を編集できませんでした。';
const ERROR_MESSAGE_USED_EMAIL = 'このメールアドレスはすでに使われています。';
const ERROR_MESSAGE_SIGNUP = 'サインアップできませんでした。';
const ERROR_MESSAGE_CONFIRM_INPUT = '入力内容を確認してください。';
const ERROR_MESSAGE_INVALID_EMAIL = '64字以内のメールアドレスを使用してください。';
const ERROR_MESSAGE_INVALID_PASSWORD = '64字以内のパスワードにしてください。';
const ERROR_MESSAGE_NOT_MATCH_RETYPE_PASSWORD = '入力されたパスワードが一致しません。';
const ERROR_MESSAGE_EMPTY_EMAIL = 'メールアドレスを入力してください。';
const ERROR_MESSAGE_EMPTY_PASSWORD = 'パスワードを入力してください。';
const ERROR_MESSAGE_INVALID_NICKNAME = '32字以内のニックネームにしてください。';
const ERROR_MESSAGE_WRONG_EMAIL_OR_PASSWORD = 'メールアドレスまたはパスワードが間違っています。';
const ERROR_MESSAGE_VALIDATE_MAIL = 'メールアドレスを検証できませんでした。';
const ERROR_MESSAGE_POST = '投稿できませんでした。';
const ERROR_MESSAGE_REGISTER_VALIDATION_MAIL_DATA = 'メールアドレスの検証のためのデータを登録できませんでした。';
const ERROR_MESSAGE_NO_VALIDATION_MAIL_DATA = '登録されたメールアドレスの検証のためのデータがありませんでした。';
const ERROR_MESSAGE_GET_VALIDATION_MAIL_DATA = '登録されたメールアドレスの検証のためのデータを取得できませんでした。';
const ERROR_MESSAGE_GET_VALIDATION_MAIL_DATA_ID = 'メールアドレスの検証のためのデータIDを取得できませんでした。';
const ERROR_MESSAGE_GET_POST_ID = '投稿IDを取得できませんでした。';
const ERROR_MESSAGE_GET_MAIL = 'メールアドレスを取得できませんでした。';
const ERROR_MESSAGE_SEND_VALIDATION_MAIL = 'メールアドレスの検証メールを送信できませんでした。';
const ERROR_MESSAGE_CHANGE_PASSWORD = 'パスワードを変更できませんでした。';
const ERROR_MESSAGE_DELETE_USER = 'ユーザー情報を削除できませんでした。';
const ERROR_MESSAGE_INVALID_OPERATION = '無効な操作です。';
const ERROR_MESSAGE_NOT_AUTHOR = '作者ではないため操作できません。';
const ERROR_MESSAGE_EMPTY_POST_CONTENT = '投稿内容がありません。';
const ERROR_MESSAGE_EDIT_POST = '投稿を編集できませんでした。';
const ERROR_MESSAGE_GET_COUNT = 'カウントを取得できませんでした。';
const ERROR_MESSAGE_POWER_WORD = '「パワーワードすぎるね」できませんでした。';


const MAIL_TITLE_SIGNUP_AND_VALIDATION = 'サインアップ完了とメール検証について';
const MAIL_TITLE_VALIDATION = 'メール検証について';

const MAIL_CONTENT_SIGNUP_AND_VALIDATION = [
    '掲示板『パワー』にサインアップいただきありがとうございます。',
    '送信していただいたメールアドレスを検証するために下のリンク先にアクセスしていただくようお願いいたします。',
];
const MAIL_CONTENT_VALIDATION = [
    '掲示板『パワー』をご使用ありがとうございます。',
    '登録されているメールアドレスを検証するために下のリンク先にアクセスしていただくようお願いいたします。',
];
