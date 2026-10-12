const menu = document.querySelector(".menu");
const nav = document.querySelector(".nav-links");
if (menu && nav) menu.addEventListener("click", () => nav.classList.toggle("show"));
document.querySelectorAll(".nav-links a").forEach(link => link.addEventListener("click", () => nav && nav.classList.remove("show")));

// Product slideshow on the home hero
const slides = document.querySelectorAll(".product-slider .hero-product");
if (slides.length > 1) { let current = 0; slides.forEach((s,i)=>{s.style.display=i===0?'block':'none';}); setInterval(()=>{slides[current].style.display='none'; current=(current+1)%slides.length; slides[current].style.display='block'; slides[current].classList.add('reveal');}, 3600); }

// Product info popup and WhatsApp order links
const productModal=addModal('ymrProductModal',`<div class="modal-panel"><button class="modal-close" data-close-modal aria-label="Close">×</button><div class="eyebrow">YMR HEALTH PRODUCT</div><h2 id="ymrProductTitle">Product information</h2><img id="ymrProductImage" class="modal-product-img" src="IMAGE/pomegranate-juice.jpg" alt="Product"><p id="ymrProductDescription">Contact YMR for product details, availability and current pricing.</p><p class="price-note">Price: Contact us for current price</p><a id="ymrProductOrder" class="btn btn-orange" target="_blank" rel="noopener" href="https://wa.me/60198366411">ORDER VIA WHATSAPP</a></div>`);
document.querySelectorAll('[data-product-info]').forEach(btn=>btn.addEventListener('click',()=>{const card=btn.closest('.product');const title=btn.dataset.productInfo;const img=card?.querySelector('img');const desc=card?.querySelector('.product-info p');document.getElementById('ymrProductTitle').textContent=title;document.getElementById('ymrProductImage').src=img?.getAttribute('src')||'IMAGE/pomegranate-juice.jpg';document.getElementById('ymrProductDescription').textContent=desc?.textContent.trim()||'Contact YMR for product details, availability and current pricing.';document.getElementById('ymrProductOrder').href='https://wa.me/60198366411?text='+encodeURIComponent('Hi, I am interested in ordering '+title+'. Please share the price and product details.');productModal.classList.add('open');}));

// Certificate/document click to enlarge in a popup
const docModal=addModal('ymrDocumentModal',`<div class="modal-panel"><button class="modal-close" data-close-modal aria-label="Close">×</button><div class="eyebrow">COMPANY DOCUMENT</div><h2 id="ymrDocumentTitle">Certificate</h2><img id="ymrDocumentImage" class="modal-document-img" src="" alt="Enlarged company document"><p id="ymrDocumentDescription"></p></div>`);
document.querySelectorAll('.document').forEach(card=>{card.style.cursor='zoom-in';card.addEventListener('click',()=>{const img=card.querySelector('img');document.getElementById('ymrDocumentTitle').textContent=card.querySelector('h3')?.textContent.trim()||'Company document';document.getElementById('ymrDocumentImage').src=img?.getAttribute('src')||'';document.getElementById('ymrDocumentDescription').textContent=card.querySelector('p')?.textContent.trim()||'';docModal.classList.add('open');});});

// Subtle scroll-follow movement for image panels, with reduced-motion support
const followItems=document.querySelectorAll('.owner-card,.about-image,.product-image');
if(!window.matchMedia('(prefers-reduced-motion: reduce)').matches){window.addEventListener('scroll',()=>{const vh=window.innerHeight;followItems.forEach((el,i)=>{const r=el.getBoundingClientRect();if(r.bottom>0&&r.top<vh){const delta=(vh/2-(r.top+r.height/2))*.025;el.style.transform=`translateY(${Math.max(-12,Math.min(12,delta))}px)`;}});},{passive:true});}
