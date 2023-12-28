//スクロール位置を取得
$(function() {
$(window).scroll(function() {
if ($(window).scrollTop() > 1) {
$('#header_1').addClass('sticky_1');
}
else {
$('#header_1').removeClass('sticky_1');
}
});
});

$(function() {
 $(window).scroll(function() {
 if ($(window).scrollTop() > 1) {
 $('#header_2').addClass('sticky_2');
 }
 else {
 $('#header_2').removeClass('sticky_2');
 }
 });
 });


//ハンバーガーメニュー
$(function() {
$('#toggle').click(function () {
$('#header_mobile nav').toggleClass('visible');
$('#trigger').toggleClass('active');
$('#header_area').toggleClass('bg');
});
$('#header_mobile nav a').click(function () {
$('#header_mobile nav').removeClass('visible');
$('#trigger').removeClass('active');
$('#header_area').removeClass('bg');
});
});


//アンカーリンク
$(function() {
var desktop = $(window).width();
var mobile = 700;

if (desktop >= mobile) {
var headerheight = 130;} //デスクトップヘッダー
else {
var headerheight = 120;} //モバイルヘッダー

$('a[href^="#"]').click(function() {
var href = $(this).attr('href');
var target = $(href == "#" || href == '' ? 'html' : href);
var position = target.offset().top - headerheight;				
$('html,body').animate({scrollTop: position},1000);return false;
});

});


//オンライン無料カウンセリング（固定バナー）
$(function() {
$('#online_counseling_desktop p').click(function () {
$('#online_counseling_desktop').addClass('hide');
});
});


//ページのトップに戻るスクロール処理
$(function() {
$(window).scroll(function() {
if ($(window).scrollTop() > 500) {
$('#return').addClass('active');
}
else {
$('#return').removeClass('active');
}
$('#return').click(function () {
$('html,body').animate({scrollTop:0},1000);return false;
});
if ($(window).scrollTop() > 500) {
$('#online_counseling_mobile').addClass('active');
}
else {
$('#online_counseling_mobile').removeClass('active');
}
});
});


//サクセスストーリーズ内モバイル環境でテキストの位置を揃える
function match_height(target_attr)
{
const target_elements = document.querySelectorAll(target_attr);
if(target_elements.length > 1) {
let height_array = [];
target_elements.forEach((element) => {
const height = element.clientHeight;
height_array.push(height);
});
const max_height = Math.max(...height_array);
target_elements.forEach((node) => {
node.style.height = max_height + 'px';
});
}
}
window.addEventListener('load', () => {
match_height('#stories_mobile li');
});

//One Month Programパネル内のリンクテキストの位置を揃える
//お客様の声テキストブロックの高さを揃える
//コース紹介の各コース内テキストブロックの高さを揃える
$(function() {
var desktop = $(window).width();
var mobile = 700;
if (desktop >= mobile) {

 function match_height(target_attr)
 {
 const target_elements = document.querySelectorAll(target_attr);
 if(target_elements.length > 1) {
 let height_array = [];
 target_elements.forEach((element) => {
 const height = element.clientHeight;
 height_array.push(height);
 });
 const max_height = Math.max(...height_array);
 target_elements.forEach((node) => {
 node.style.height = max_height + 'px';
 });
 }
 }
 window.addEventListener('load', () => {
 match_height('#block_4 li div');
 });


 function match_height(target_attr)
 {
 const target_elements = document.querySelectorAll(target_attr);
 if(target_elements.length > 1) {
 let height_array = [];
 target_elements.forEach((element) => {
 const height = element.clientHeight;
 height_array.push(height);
 });
 const max_height = Math.max(...height_array);
 target_elements.forEach((node) => {
 node.style.height = max_height + 'px';
 });
 }
 }
 window.addEventListener('load', () => {
 match_height('#block_11 article section p');
 });


 function match_height(target_attr)
 {
 const target_elements = document.querySelectorAll(target_attr);
 if(target_elements.length > 1) {
 let height_array = [];
 target_elements.forEach((element) => {
 const height = element.clientHeight;
 height_array.push(height);
 });
 const max_height = Math.max(...height_array);
 target_elements.forEach((node) => {
 node.style.height = max_height + 'px';
 });
 }
 }
 window.addEventListener('load', () => {
 match_height('#block_12 article section p');
 });
 
 }
 });


//アコーディオン
$(function() {
 $('.accordion_title').on('click', function () {
 $(this).next().slideToggle(200); //クリックでコンテンツを開閉
 $(this).toggleClass('open', 200); //矢印の向きを変更
 });
 });