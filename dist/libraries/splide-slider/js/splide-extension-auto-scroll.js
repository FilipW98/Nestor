/*!
 * @splidejs/splide-extension-auto-scroll
 * Version  : 0.3.7
 * License  : MIT
 * Copyright: 2022 Naotoshi Fujita
*/(function(_){typeof define=="function"&&define.amd?define(_):_()})(function(){"use strict";function _(n){return Array.isArray(n)}function z(n){return _(n)?n:[n]}function J(n,t){z(n).forEach(t)}function I(n){return requestAnimationFrame(n)}var L="move",P="moved",K="updated",b="drag",M="scroll",V="scrolled",Q="destroy";function U(n){var t=n.event,o={},e=[];function u(i,E,f){t.on(i,E,o,f)}function d(i){t.off(i,o)}function a(i,E,f,c){s(i,E,function(p,l){e.push([p,l,f,c]),p.addEventListener(l,f,c)})}function h(i,E,f){s(i,E,function(c,p){e=e.filter(function(l){return l[0]===c&&l[1]===p&&(!f||l[2]===f)?(c.removeEventListener(p,l[2],l[3]),!1):!0})})}function s(i,E,f){J(i,function(c){c&&E.split(" ").forEach(f.bind(null,c))})}function S(){e=e.filter(function(i){return h(i[0],i[1])}),t.offBy(o)}return t.on(Q,S,o),{on:u,off:d,emit:t.emit,bind:a,unbind:h,destroy:S}}function W(n,t,o,e){var u=Date.now,d,a=0,h,s=!0,S=0;function i(){if(!s){var m=u()-d;if(m>=n?(a=1,d=u()):a=m/n,o&&o(a),a===1&&(t(),e&&++S>=e))return f();I(i)}}function E(m){!m&&p(),d=u()-(m?a*n:0),s=!1,I(i)}function f(){s=!0}function c(){d=u(),a=0,o&&o(a)}function p(){cancelAnimationFrame(h),a=0,h=0,s=!0}function l(m){n=m}function A(){return s}return{start:E,rewind:c,pause:f,cancel:p,set:l,isPaused:A}}var X="slide";function N(n){return!j(n)&&typeof n=="object"}function Z(n){return typeof n=="undefined"}function j(n){return n===null}var k=Array.prototype;function nn(n,t,o){return k.slice.call(n,t,o)}function tn(n,t,o){if(n){var e=Object.keys(n);e=o?e.reverse():e;for(var u=0;u<e.length;u++){var d=e[u];if(d!=="__proto__"&&t(n[d],d)===!1)break}}return n}function F(n){return nn(arguments,1).forEach(function(t){tn(t,function(o,e){n[e]=t[e]})}),n}var R=Math.min,q=Math.max,vn=Math.floor,En=Math.ceil,mn=Math.abs;function en(n,t,o){var e=R(t,o),u=q(t,o);return R(q(e,n),u)}var rn={speed:1,autoStart:!0,pauseOnHover:!0,pauseOnFocus:!0};function on(n,t,o){var e=U(n),u=e.on,d=e.off,a=e.bind,h=e.unbind,s=t.Move,S=s.translate,i=s.getPosition,E=s.toIndex,f=s.getLimit,c=t.Controller,p=c.setIndex,l=c.getIndex,A=t.Direction.orient,m=n.root,y={},v,C,H,$,T,g;function un(){var r=o.autoScroll;y=F({},rn,N(r)?r:{})}function B(){!v&&o.autoScroll!==!1&&(v=W(0,cn),fn(),sn())}function G(){v&&(v.cancel(),v=null,g=void 0,d([L,b,M,P,V]),h(m,"mouseenter mouseleave focusin focusout"))}function fn(){y.pauseOnHover&&a(m,"mouseenter mouseleave",function(r){H=r.type==="mouseenter",D()}),y.pauseOnFocus&&a(m,"focusin focusout",function(r){$=r.type==="focusin",D()}),u(K,an),u([L,b,M],function(){T=!0,O(!1)}),u([P,V],function(){T=!1,D()})}function an(){var r=o.autoScroll;r!==!1?(y=F(y,N(r)?r:{}),B()):G(),v&&!Z(g)&&S(g)}function sn(){y.autoStart&&(document.readyState==="complete"?x():a(window,"load",x))}function x(){v&&v.isPaused()&&v.start(!0)}function O(r){r===void 0&&(r=!0),v&&!v.isPaused()&&v.pause(),C=r}function D(){C||(!H&&!$&&!T?x():O(!1))}function cn(){var r=i(),w=dn(r);r!==w?(S(w),ln(w),g=w):(O(!1),y.rewind&&n.go(0))}function dn(r){var w=y.speed||1;return r+=A(w),n.is(X)&&(r=en(r,f(!1),f(!0))),r}function ln(r){var w=n.length,Y=(E(r)+w)%w;Y!==l()&&(p(Y),t.Slides.update(),t.Pagination.update())}return{setup:un,mount:B,destroy:G,play:x,pause:O}}typeof window!="undefined"&&(window.splide=window.splide||{},window.splide.Extensions=window.splide.Extensions||{},window.splide.Extensions.AutoScroll=on);/*!
* Splide.js
* Version  : 3.6.11
* License  : MIT
* Copyright: 2022 Naotoshi Fujita
*/});