!function(){"use strict";var e;e=()=>{const e=document.querySelectorAll(".wp-block-themeisle-blocks-circle-counter");Array.from(e).forEach((e=>{const t=1e3*e.dataset.duration,{percentage:r}=e.dataset,s=e.dataset.height,{strokeWidth:o}=e.dataset,n=e.dataset.fontSizePercent,{backgroundStroke:c}=e.dataset,{progressStroke:i}=e.dataset,a=s/2,l=a-o/2,d=2*Math.PI*l;if(0>l)return;const h=e.querySelector(".wp-block-themeisle-blocks-circle-counter__bar");h.style.height=s+"px",h.style.width=s+"px";const u=document.createElementNS("http://www.w3.org/2000/svg","svg");u.classList.add("wp-block-themeisle-blocks-circle-counter-container"),u.setAttribute("height",s),u.setAttribute("width",s);const p=document.createElementNS("http://www.w3.org/2000/svg","circle");p.classList.add("wp-block-themeisle-blocks-circle-counter-bg"),p.setAttribute("cx",a),p.setAttribute("cy",a),p.setAttribute("r",l),p.style.stroke=c,p.style.strokeWidth=o;const y=document.createElementNS("http://www.w3.org/2000/svg","circle");y.classList.add("wp-block-themeisle-blocks-circle-counter-progress"),y.setAttribute("cx",a),y.setAttribute("cy",a),y.setAttribute("r",l),y.style.stroke=i,y.style.strokeWidth=o,y.style.strokeDasharray=d;const f=document.createElementNS("http://www.w3.org/2000/svg","text");if(f.classList.add("wp-block-themeisle-blocks-circle-counter-text"),f.setAttribute("x","50%"),f.setAttribute("y","50%"),f.style.fill=i,f.style.fontSize=n+"px",u.appendChild(p),u.appendChild(y),u.appendChild(f),h.appendChild(u),t){let s;y.style.strokeDashoffset=d,f.innerText="0%";const o=new IntersectionObserver((n=>{n.forEach((n=>{if(n.isIntersecting){if(0>=n.intersectionRect.height)return y.style.strokeDashoffset=(100-r)/100*d,void(f.innerHTML=r+"%");s&&clearInterval(s);const c=20,i=parseInt(r),a=((e,t,r)=>{const s=[],o=typeof e,n=typeof t;if(0===r)throw TypeError("Step cannot be zero.");if(void 0===o||void 0===n)throw TypeError("Must pass start and end arguments.");if(o!==n)throw TypeError("Start and end arguments must be of same type.");if(void 0===r&&(r=1),t<e&&(r=-r),"number"===o)for(;0<r?t>=e:t<=e;)s.push(e),e+=r;else{if("string"!==o)throw TypeError("Only string and number types are supported");if(1!==e.length||1!==t.length)throw TypeError("Only strings with one character are supported.");for(e=e.charCodeAt(0),t=t.charCodeAt(0);0<r?t>=e:t<=e;)s.push(String.fromCharCode(e)),e+=r}return s})(0,t,c).map((e=>e/t*i)).reverse();s=setInterval((()=>{const t=Math.round(a.pop());y.style.strokeDashoffset=(100-t)/100*d,f.innerHTML=t+"%",a.length||(o.unobserve(e),clearInterval(s))}),c)}}))}),{root:null,rootMargin:"0px",threshold:[.6]});setTimeout((()=>o.observe(e)),100)}else y.style.strokeDashoffset=(100-r)/100*d,f.innerHTML=r+"%"}))},"undefined"!=typeof document&&("complete"!==document.readyState&&"interactive"!==document.readyState?document.addEventListener("DOMContentLoaded",e):e())}();