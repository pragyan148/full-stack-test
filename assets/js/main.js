$(function(){
$.getJSON('api.php', function(data){
const tabs = Object.keys(data);
if (!tabs.length) { $('#tabs-wrapper').html('<p>No slides found</p>'); return; }


let tabsHtml = '<div class="nav flex-column nav-pills" role="tablist">';
tabs.forEach((t, idx) => {
tabsHtml += `<button class="nav-link ${idx===0?'active':''}" data-tab="${t}">${t}</button>`;
});
tabsHtml += '</div>';
$('#tabs-wrapper').html(tabsHtml);


buildSliderForTab(tabs[0], data[tabs[0]]);


$('#tabs-wrapper').on('click', '.nav-link', function(){
$('#tabs-wrapper .nav-link').removeClass('active');
$(this).addClass('active');
const tab = $(this).data('tab');
buildSliderForTab(tab, data[tab]);
});


function buildSliderForTab(tab, slides){
let html = '<div id="carousel" class="carousel slide" data-bs-ride="carousel">';
html += '<div class="carousel-inner">';
slides.forEach((s, idx)=>{
html += `<div class="carousel-item ${idx===0?'active':''}" data-img="${s.image_path}">
<div class="p-4">
<h3>${s.slide_title||''}</h3>
<p>${s.slide_description||''}</p>
</div>
</div>`;
});
html += '</div>';
html += '<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>';
html += '<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>';
html += '</div>';
$('#slider-wrapper').html(html);
updateImageBox(slides[0].image_path);


$('#carousel').on('slid.bs.carousel', function(e){
const img = $(e.relatedTarget).data('img');
updateImageBox(img);
});
}


function updateImageBox(img){
$('#image-box').css('background-image', `url(${img})`).css('background-size','cover');
}
});
});
