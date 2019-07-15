<?php header('Content-Type: application/javascript'); ?>/* axios v0.19.0 | (c) 2019 by Matt Zabriskie */
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.axios=t():e.axios=t()}(this,function(){return function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={exports:{},id:r,loaded:!1};return e[r].call(o.exports,o,o.exports,t),o.loaded=!0,o.exports}var n={};return t.m=e,t.c=n,t.p="",t(0)}([function(e,t,n){e.exports=n(1)},function(e,t,n){"use strict";function r(e){var t=new i(e),n=s(i.prototype.request,t);return o.extend(n,i.prototype,t),o.extend(n,t),n}var o=n(2),s=n(3),i=n(5),a=n(22),u=n(11),c=r(u);c.Axios=i,c.create=function(e){return r(a(c.defaults,e))},c.Cancel=n(23),c.CancelToken=n(24),c.isCancel=n(10),c.all=function(e){return Promise.all(e)},c.spread=n(25),e.exports=c,e.exports.default=c},function(e,t,n){"use strict";function r(e){return"[object Array]"===j.call(e)}function o(e){return"[object ArrayBuffer]"===j.call(e)}function s(e){return"undefined"!=typeof FormData&&e instanceof FormData}function i(e){var t;return t="undefined"!=typeof ArrayBuffer&&ArrayBuffer.isView?ArrayBuffer.isView(e):e&&e.buffer&&e.buffer instanceof ArrayBuffer}function a(e){return"string"==typeof e}function u(e){return"number"==typeof e}function c(e){return"undefined"==typeof e}function f(e){return null!==e&&"object"==typeof e}function p(e){return"[object Date]"===j.call(e)}function d(e){return"[object File]"===j.call(e)}function l(e){return"[object Blob]"===j.call(e)}function h(e){return"[object Function]"===j.call(e)}function m(e){return f(e)&&h(e.pipe)}function y(e){return"undefined"!=typeof URLSearchParams&&e instanceof URLSearchParams}function g(e){return e.replace(/^\s*/,"").replace(/\s*$/,"")}function x(){return("undefined"==typeof navigator||"ReactNative"!==navigator.product&&"NativeScript"!==navigator.product&&"NS"!==navigator.product)&&("undefined"!=typeof window&&"undefined"!=typeof document)}function v(e,t){if(null!==e&&"undefined"!=typeof e)if("object"!=typeof e&&(e=[e]),r(e))for(var n=0,o=e.length;n<o;n++)t.call(null,e[n],n,e);else for(var s in e)Object.prototype.hasOwnProperty.call(e,s)&&t.call(null,e[s],s,e)}function w(){function e(e,n){"object"==typeof t[n]&&"object"==typeof e?t[n]=w(t[n],e):t[n]=e}for(var t={},n=0,r=arguments.length;n<r;n++)v(arguments[n],e);return t}function b(){function e(e,n){"object"==typeof t[n]&&"object"==typeof e?t[n]=b(t[n],e):"object"==typeof e?t[n]=b({},e):t[n]=e}for(var t={},n=0,r=arguments.length;n<r;n++)v(arguments[n],e);return t}function E(e,t,n){return v(t,function(t,r){n&&"function"==typeof t?e[r]=S(t,n):e[r]=t}),e}var S=n(3),R=n(4),j=Object.prototype.toString;e.exports={isArray:r,isArrayBuffer:o,isBuffer:R,isFormData:s,isArrayBufferView:i,isString:a,isNumber:u,isObject:f,isUndefined:c,isDate:p,isFile:d,isBlob:l,isFunction:h,isStream:m,isURLSearchParams:y,isStandardBrowserEnv:x,forEach:v,merge:w,deepMerge:b,extend:E,trim:g}},function(e,t){"use strict";e.exports=function(e,t){return function(){for(var n=new Array(arguments.length),r=0;r<n.length;r++)n[r]=arguments[r];return e.apply(t,n)}}},function(e,t){e.exports=function(e){return null!=e&&null!=e.constructor&&"function"==typeof e.constructor.isBuffer&&e.constructor.isBuffer(e)}},function(e,t,n){"use strict";function r(e){this.defaults=e,this.interceptors={request:new i,response:new i}}var o=n(2),s=n(6),i=n(7),a=n(8),u=n(22);r.prototype.request=function(e){"string"==typeof e?(e=arguments[1]||{},e.url=arguments[0]):e=e||{},e=u(this.defaults,e),e.method=e.method?e.method.toLowerCase():"get";var t=[a,void 0],n=Promise.resolve(e);for(this.interceptors.request.forEach(function(e){t.unshift(e.fulfilled,e.rejected)}),this.interceptors.response.forEach(function(e){t.push(e.fulfilled,e.rejected)});t.length;)n=n.then(t.shift(),t.shift());return n},r.prototype.getUri=function(e){return e=u(this.defaults,e),s(e.url,e.params,e.paramsSerializer).replace(/^\?/,"")},o.forEach(["delete","get","head","options"],function(e){r.prototype[e]=function(t,n){return this.request(o.merge(n||{},{method:e,url:t}))}}),o.forEach(["post","put","patch"],function(e){r.prototype[e]=function(t,n,r){return this.request(o.merge(r||{},{method:e,url:t,data:n}))}}),e.exports=r},function(e,t,n){"use strict";function r(e){return encodeURIComponent(e).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}var o=n(2);e.exports=function(e,t,n){if(!t)return e;var s;if(n)s=n(t);else if(o.isURLSearchParams(t))s=t.toString();else{var i=[];o.forEach(t,function(e,t){null!==e&&"undefined"!=typeof e&&(o.isArray(e)?t+="[]":e=[e],o.forEach(e,function(e){o.isDate(e)?e=e.toISOString():o.isObject(e)&&(e=JSON.stringify(e)),i.push(r(t)+"="+r(e))}))}),s=i.join("&")}if(s){var a=e.indexOf("#");a!==-1&&(e=e.slice(0,a)),e+=(e.indexOf("?")===-1?"?":"&")+s}return e}},function(e,t,n){"use strict";function r(){this.handlers=[]}var o=n(2);r.prototype.use=function(e,t){return this.handlers.push({fulfilled:e,rejected:t}),this.handlers.length-1},r.prototype.eject=function(e){this.handlers[e]&&(this.handlers[e]=null)},r.prototype.forEach=function(e){o.forEach(this.handlers,function(t){null!==t&&e(t)})},e.exports=r},function(e,t,n){"use strict";function r(e){e.cancelToken&&e.cancelToken.throwIfRequested()}var o=n(2),s=n(9),i=n(10),a=n(11),u=n(20),c=n(21);e.exports=function(e){r(e),e.baseURL&&!u(e.url)&&(e.url=c(e.baseURL,e.url)),e.headers=e.headers||{},e.data=s(e.data,e.headers,e.transformRequest),e.headers=o.merge(e.headers.common||{},e.headers[e.method]||{},e.headers||{}),o.forEach(["delete","get","head","post","put","patch","common"],function(t){delete e.headers[t]});var t=e.adapter||a.adapter;return t(e).then(function(t){return r(e),t.data=s(t.data,t.headers,e.transformResponse),t},function(t){return i(t)||(r(e),t&&t.response&&(t.response.data=s(t.response.data,t.response.headers,e.transformResponse))),Promise.reject(t)})}},function(e,t,n){"use strict";var r=n(2);e.exports=function(e,t,n){return r.forEach(n,function(n){e=n(e,t)}),e}},function(e,t){"use strict";e.exports=function(e){return!(!e||!e.__CANCEL__)}},function(e,t,n){"use strict";function r(e,t){!s.isUndefined(e)&&s.isUndefined(e["Content-Type"])&&(e["Content-Type"]=t)}function o(){var e;return"undefined"!=typeof process&&"[object process]"===Object.prototype.toString.call(process)?e=n(13):"undefined"!=typeof XMLHttpRequest&&(e=n(13)),e}var s=n(2),i=n(12),a={"Content-Type":"application/x-www-form-urlencoded"},u={adapter:o(),transformRequest:[function(e,t){return i(t,"Accept"),i(t,"Content-Type"),s.isFormData(e)||s.isArrayBuffer(e)||s.isBuffer(e)||s.isStream(e)||s.isFile(e)||s.isBlob(e)?e:s.isArrayBufferView(e)?e.buffer:s.isURLSearchParams(e)?(r(t,"application/x-www-form-urlencoded;charset=utf-8"),e.toString()):s.isObject(e)?(r(t,"application/json;charset=utf-8"),JSON.stringify(e)):e}],transformResponse:[function(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,validateStatus:function(e){return e>=200&&e<300}};u.headers={common:{Accept:"application/json, text/plain, */*"}},s.forEach(["delete","get","head"],function(e){u.headers[e]={}}),s.forEach(["post","put","patch"],function(e){u.headers[e]=s.merge(a)}),e.exports=u},function(e,t,n){"use strict";var r=n(2);e.exports=function(e,t){r.forEach(e,function(n,r){r!==t&&r.toUpperCase()===t.toUpperCase()&&(e[t]=n,delete e[r])})}},function(e,t,n){"use strict";var r=n(2),o=n(14),s=n(6),i=n(17),a=n(18),u=n(15);e.exports=function(e){return new Promise(function(t,c){var f=e.data,p=e.headers;r.isFormData(f)&&delete p["Content-Type"];var d=new XMLHttpRequest;if(e.auth){var l=e.auth.username||"",h=e.auth.password||"";p.Authorization="Basic "+btoa(l+":"+h)}if(d.open(e.method.toUpperCase(),s(e.url,e.params,e.paramsSerializer),!0),d.timeout=e.timeout,d.onreadystatechange=function(){if(d&&4===d.readyState&&(0!==d.status||d.responseURL&&0===d.responseURL.indexOf("file:"))){var n="getAllResponseHeaders"in d?i(d.getAllResponseHeaders()):null,r=e.responseType&&"text"!==e.responseType?d.response:d.responseText,s={data:r,status:d.status,statusText:d.statusText,headers:n,config:e,request:d};o(t,c,s),d=null}},d.onabort=function(){d&&(c(u("Request aborted",e,"ECONNABORTED",d)),d=null)},d.onerror=function(){c(u("Network Error",e,null,d)),d=null},d.ontimeout=function(){c(u("timeout of "+e.timeout+"ms exceeded",e,"ECONNABORTED",d)),d=null},r.isStandardBrowserEnv()){var m=n(19),y=(e.withCredentials||a(e.url))&&e.xsrfCookieName?m.read(e.xsrfCookieName):void 0;y&&(p[e.xsrfHeaderName]=y)}if("setRequestHeader"in d&&r.forEach(p,function(e,t){"undefined"==typeof f&&"content-type"===t.toLowerCase()?delete p[t]:d.setRequestHeader(t,e)}),e.withCredentials&&(d.withCredentials=!0),e.responseType)try{d.responseType=e.responseType}catch(t){if("json"!==e.responseType)throw t}"function"==typeof e.onDownloadProgress&&d.addEventListener("progress",e.onDownloadProgress),"function"==typeof e.onUploadProgress&&d.upload&&d.upload.addEventListener("progress",e.onUploadProgress),e.cancelToken&&e.cancelToken.promise.then(function(e){d&&(d.abort(),c(e),d=null)}),void 0===f&&(f=null),d.send(f)})}},function(e,t,n){"use strict";var r=n(15);e.exports=function(e,t,n){var o=n.config.validateStatus;!o||o(n.status)?e(n):t(r("Request failed with status code "+n.status,n.config,null,n.request,n))}},function(e,t,n){"use strict";var r=n(16);e.exports=function(e,t,n,o,s){var i=new Error(e);return r(i,t,n,o,s)}},function(e,t){"use strict";e.exports=function(e,t,n,r,o){return e.config=t,n&&(e.code=n),e.request=r,e.response=o,e.isAxiosError=!0,e.toJSON=function(){return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:this.config,code:this.code}},e}},function(e,t,n){"use strict";var r=n(2),o=["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"];e.exports=function(e){var t,n,s,i={};return e?(r.forEach(e.split("\n"),function(e){if(s=e.indexOf(":"),t=r.trim(e.substr(0,s)).toLowerCase(),n=r.trim(e.substr(s+1)),t){if(i[t]&&o.indexOf(t)>=0)return;"set-cookie"===t?i[t]=(i[t]?i[t]:[]).concat([n]):i[t]=i[t]?i[t]+", "+n:n}}),i):i}},function(e,t,n){"use strict";var r=n(2);e.exports=r.isStandardBrowserEnv()?function(){function e(e){var t=e;return n&&(o.setAttribute("href",t),t=o.href),o.setAttribute("href",t),{href:o.href,protocol:o.protocol?o.protocol.replace(/:$/,""):"",host:o.host,search:o.search?o.search.replace(/^\?/,""):"",hash:o.hash?o.hash.replace(/^#/,""):"",hostname:o.hostname,port:o.port,pathname:"/"===o.pathname.charAt(0)?o.pathname:"/"+o.pathname}}var t,n=/(msie|trident)/i.test(navigator.userAgent),o=document.createElement("a");return t=e(window.location.href),function(n){var o=r.isString(n)?e(n):n;return o.protocol===t.protocol&&o.host===t.host}}():function(){return function(){return!0}}()},function(e,t,n){"use strict";var r=n(2);e.exports=r.isStandardBrowserEnv()?function(){return{write:function(e,t,n,o,s,i){var a=[];a.push(e+"="+encodeURIComponent(t)),r.isNumber(n)&&a.push("expires="+new Date(n).toGMTString()),r.isString(o)&&a.push("path="+o),r.isString(s)&&a.push("domain="+s),i===!0&&a.push("secure"),document.cookie=a.join("; ")},read:function(e){var t=document.cookie.match(new RegExp("(^|;\\s*)("+e+")=([^;]*)"));return t?decodeURIComponent(t[3]):null},remove:function(e){this.write(e,"",Date.now()-864e5)}}}():function(){return{write:function(){},read:function(){return null},remove:function(){}}}()},function(e,t){"use strict";e.exports=function(e){return/^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)}},function(e,t){"use strict";e.exports=function(e,t){return t?e.replace(/\/+$/,"")+"/"+t.replace(/^\/+/,""):e}},function(e,t,n){"use strict";var r=n(2);e.exports=function(e,t){t=t||{};var n={};return r.forEach(["url","method","params","data"],function(e){"undefined"!=typeof t[e]&&(n[e]=t[e])}),r.forEach(["headers","auth","proxy"],function(o){r.isObject(t[o])?n[o]=r.deepMerge(e[o],t[o]):"undefined"!=typeof t[o]?n[o]=t[o]:r.isObject(e[o])?n[o]=r.deepMerge(e[o]):"undefined"!=typeof e[o]&&(n[o]=e[o])}),r.forEach(["baseURL","transformRequest","transformResponse","paramsSerializer","timeout","withCredentials","adapter","responseType","xsrfCookieName","xsrfHeaderName","onUploadProgress","onDownloadProgress","maxContentLength","validateStatus","maxRedirects","httpAgent","httpsAgent","cancelToken","socketPath"],function(r){"undefined"!=typeof t[r]?n[r]=t[r]:"undefined"!=typeof e[r]&&(n[r]=e[r])}),n}},function(e,t){"use strict";function n(e){this.message=e}n.prototype.toString=function(){return"Cancel"+(this.message?": "+this.message:"")},n.prototype.__CANCEL__=!0,e.exports=n},function(e,t,n){"use strict";function r(e){if("function"!=typeof e)throw new TypeError("executor must be a function.");var t;this.promise=new Promise(function(e){t=e});var n=this;e(function(e){n.reason||(n.reason=new o(e),t(n.reason))})}var o=n(23);r.prototype.throwIfRequested=function(){if(this.reason)throw this.reason},r.source=function(){var e,t=new r(function(t){e=t});return{token:t,cancel:e}},e.exports=r},function(e,t){"use strict";e.exports=function(e){return function(t){return e.apply(null,t)}}}])});/*
 * This is the sdk template introduced in javascript-sdk-design
 *
 * Template Init
 * ==============
 * This is a template that offer oop Object
 *
 * To find out more sdk template, please visit javascript-sdk-design homepage
 * https://github.com/huei90/javascript-sdk-design
 */

(function (window) {
	
	
	var _api = axios.create({
		baseURL: 'https://api.monteverdeltda.com',
		withCredentials: true,
		timeout: 10000,
		responseType: 'json',
		responseEncoding: 'utf8',
	});
	_api.interceptors.response.use(function(response) {
		if (response.headers['x-xsrf-token']) {
			document.cookie = 'XSRF-TOKEN=' + response.headers['x-xsrf-token'] + '; path=/';
		};
		return response;
	});
	
	var Mv = {
		userId(){
			var self = this;
			return self._userData.userID;
		},
		api: _api,
		callback_active: function(a){
			console.log('No existe callback');
			console.log(a);
		},
		_config: {
			version: null,
			clientId: null,
		},
		_userData: {
			status: 'not_detect',
			accessToken: 'none',
			userID:'0',
			authResponse: {
				userData: {
					location: '',
					id: 0,
					username: '',
				}
			}
		},
		_configAxios: {
			url: '/openapi',
			method: 'get',
			baseURL: 'https://api.monteverdeltda.com',
			withCredentials: true,
			timeout: 1000,
			responseType: 'json',
			responseEncoding: 'utf8',
		},
		axiosDefault(){
			return {
				url: '/openapi',
				method: 'get',
				baseURL: 'https://api.monteverdeltda.com',
				withCredentials: true,
				timeout: 1000,
				responseType: 'json',
				responseEncoding: 'utf8',
			};
		},
		userDataDefault(){
			return {
				status: 'not_detect',
				accessToken: 'none',
				userID:'0',
				authResponse: {
					userData: {
						location: '',
						id: 0,
						username: '',
					}
				}
			};
		},
		init(options) {
			if (options != undefined === null || options == undefined || Mv.typeData(options) != 'object' || options.clientId == undefined || options.version == undefined )
				throw 'Optiones de init incorrectas.';
			
			if (Mv.checkVersion(options.version) == false){ throw 'Version incorrecta.'; } else { Mv._config.version = Mv.checkVersion(options.version); };
			if (Mv.clientsAuths(options.clientId) == false){ throw 'clientId incorrecto.'; } else { Mv._config.clientId = Mv.clientsAuths(options.clientId); };
			Mv.checkLoginState();
			Mv.ready(Mv.loadStyles);
			Mv.ready(Mv.Modal.loadStyle);
			Mv.ready(Mv.ButtonsLogin);
		},
		typeData(data) {
			type = (typeof data);
			if (data != null && type != 'undefined'){
				console.log('SDK - type: ' + JSON.stringify(data));
				console.log('SDK - type: ' + type);
				return type;
			} else {
				console.log('type: undefined');
				return 'undefined';
			}
		},
		checkVersion: function(version) {
			if (version === 'v2.0.0' || version === '2.0.0' || version === 'v2.0' || version === 'v2' || version === 2.0 || version === 2){
				return '2.0.0';
			} else {
				return false;
			}
		},
		clientsAuths: function(clientId) {
			if (clientId === '10000000001' || clientId === 10000000001){
				return 'default';
			} else {
				return false;
			}
		},
		testCanLocalStorage: function() {
			var mod = 'modernizr-mv';
			try {
				localStorage.setItem(mod, mod);
				localStorage.removeItem(mod);
				return true;
			} catch (e) {
				return false;
			}
		},
		_clearSesion: function(call) {
			console.log('SDK - _clearSesion');
			
			Mv.api.post('/logout', {})
				.then(a => {
					localStorage.clear();
				})
				.catch(b => {
					// console.error(b.response);
					if(b.response.status != undefined && b.response.status != 401 && Mv._userData.status != 'disconnect'){
						Mv._userData.status = 'disconnect';
					}
				})
				.finally(function(){
					localStorage.clear();
					location.reload();
				});
		},
		checkLoginState() {
			console.log('SDK - checkLoginState');
			Mv.getLoginStatus(function(response) {
				console.log(response);
			});
		},
		getLoginStatus: function(call) {
			console.log('SDK - getLoginStatus');
			Mv.checkSession(call);
		},
		statusSession: function() {
			if(!localStorage._userid || localStorage._userid == null || localStorage._userid == undefined || localStorage._userid <= 0){
				return false;
			}else{
				return true;
			}
		},
		ButtonsLogin: function(){
			console.log('SDK - ButtonsLogin mv:login-button');
			var BtnsLogin = document.getElementsByTagName("mv:login-button");
			// console.log(BtnsLogin);
			// Organizar permisos de acceso a la DB
			for (var i = 0; i < BtnsLogin.length; i++) {
				// console.log(BtnsLogin[i].attributes);
				if(BtnsLogin[i].attributes.scope != undefined){
					// console.log(BtnsLogin[i].attributes['scope'].value);
				};
				if(BtnsLogin[i].attributes.scope != undefined){
					// console.log(BtnsLogin[i].attributes['onlogin'].value);
					if(typeof BtnsLogin[i].attributes['onlogin'].value === 'function') {
						// console.log('Es seguro ejecutar la función');
					}
				}
				
				var button = document.createElement("button");
				if(Mv.statusSession() == true){
					button.className = "orange";
					button.innerHTML = "Cerrar Sesion";
					button.addEventListener ("click", function() {
						Mv._clearSesion();	
					});
				} else {
					button.className = "blue";
					button.innerHTML = "Inicia sesion en Monteverde";
					button.addEventListener ("click", function() {
						Mv.login(function(response){
							console.log('SDK - Mv.login in ButtonsLogin');
							console.log(response);
							if(response.status === 'connected'){
								location.reload();
							}
						})
					});
				};
				BtnsLogin[i].append(button);
				
			}
		},
		intervalSessionRefresh: null,
		checkSession: function(call){
			var self = this;
			console.log('SDK - checkSession');
			if (Mv.testCanLocalStorage() === true){
				console.log('SDK - se pude almacenar la session de manera correcta');
				if(Mv.statusSession() == true){
					console.log('SDK - El usuario si existo');
					Mv._userData.accessToken = localStorage._token;
					Mv._userData.userID = localStorage._userid;
					console.log(localStorage._userid);
					console.log(localStorage._token);
					
					/* Local */
					session_local = false;
					session_server = false;
					Mv.api.get('https://api.monteverdeltda.com/records/users/' + localStorage._userid)
					  .then(function (response) {
							// console.log(response);
						session_local = true;
						if (session_local === true) {
							Mv._userData.status = 'connected';
							Mv._userData.userID = response.data.id;
							Mv._userData.authResponse.userData = response.data;
						} else {
							Mv._userData.status = 'no_connected';
							localStorage.clear();
							Mv._userData.accessToken = 'none';
							Mv._userData.userID = 0;
						}
					  })
					  .catch(function (error) {
					  })
					  .finally(function () {
						/* Servidor */
						Mv.api.get('/records/users/' + localStorage._userid)
						  .then(function (response) {
							// console.log(response);
							session_server = true;
							if (session_server === true) {
								Mv._userData.status = 'connected';
								Mv._userData.userID = response.data.id;
								Mv._userData.authResponse.userData = response.data;
							} else {
								Mv._userData.status = 'no_connected';
								localStorage.clear();
								Mv._userData.accessToken = 'none';
								Mv._userData.userID = 0;
							}
						  })
						  .catch(function (error) {
						  })
						  .finally(function () {
							console.log(session_local);
							console.log(session_server);
							if(call != undefined && (typeof call) == 'function'){
								call(Mv._userData);
							}
						  })
					  });
				} else {
					console.log('SDK - El usuario no existe');
					return (Mv._userData);
				};
				return (Mv._userData);
			} else { throw 'LocalStorage no habilitado, no se puede continuar.'; };
		},
		_checkSession: function(){
			console.log('SDK - checkSession');
			if (Mv.testCanLocalStorage() === true){
				console.log('SDK - checkSession - testCanLocalStorage');
				if(Mv.statusSession() == true){
					console.log('SDK - checkSession - testCanLocalStorage - statusSession - Session OK');
					console.log(localStorage._userid);
					console.log(localStorage._token);
					
					/* Local */
					axios.get('https://api.monteverdeltda.com/records/users/' + localStorage._userid)
					  .then(function (response) {
						// handle success
						console.log(response);
					  })
					  .catch(function (error) {
						// handle error
						console.log(error);
					  })
					  .finally(function () {
						// always executed
					  })
					
					/* Servidor */
					Mv.api.get('/records/users/' + localStorage._userid, {})
						.then(a => {
							console.log(a);
							Mv.saveSession(a);
						})
						.catch(b => {
							console.log(b);
							if(b.response.status != undefined && b.response.status != 401 && Mv._userData.status != 'disconnect'){
								alert('Este usuario no existe o no tiene acceso al contenido.');
								Mv._clearSesion();
							}
						})
						.finally(function(){
							console.log('SDK - checkSession - finally users');
							return (Mv._userData);
						});
				} else {
					return (Mv._userData);
				};
			} else { throw 'LocalStorage no habilitado, no se puede continuar.'; };
		},
		loadStyles: function(){
			var css = '';
			css += `
				.button{ @include buttonize(0, 0, 95, 1); border-radius: 3px; cursor: pointer; display: inline-block; font-family: Verdana, sans-serif; font-size: 12px; font-weight: 400; line-height: 20px; padding: 9px 16px 9px; margin: 16px 0 0 16px; transition: all 20ms ease-out; vertical-align: top;}
				.button-blue{ @include buttonize(199, 71, 89);}
				.button-green{ @include buttonize(97, 42, 80);}
				.button-purple{ @include buttonize(249, 34, 73);}
				.button-orange{ @include buttonize(26, 77, 96);}
				.button-red{ @include buttonize(4, 58, 93);}
				.button-yellow{ @include buttonize(49, 54, 99, 1);}
				.button .fa{ float: left; font-size: 14px; line-height: 20px; margin: -1px 8px 0 -4px; vertical-align: top;}
						/* Normal white Button as seen on Google.com*/
				button {
					color: #444444;
					background: #F3F3F3;
					border: 1px #DADADA solid;
					padding: 5px 10px;
					border-radius: 2px;
					font-weight: bold;
					font-size: 9pt;
					outline: none;
				}

				button:hover {
					border: 1px #C6C6C6 solid;
					box-shadow: 1px 1px 1px #EAEAEA;
					color: #333333;
					background: #F7F7F7;
				}

				button:active {
					box-shadow: inset 1px 1px 1px #DFDFDF;   
				}

				/* Blue button as seen on translate.google.com*/
				button.blue {
					color: white;
					background: #4C8FFB;
					border: 1px #3079ED solid;
					box-shadow: inset 0 1px 0 #80B0FB;
				}

				button.blue:hover {
					border: 1px #2F5BB7 solid;
					box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
					background: #3F83F1;
				}

				button.blue:active {
					box-shadow: inset 0 2px 5px #2370FE;   
				}

				/* Orange button as seen on blogger.com*/
				button.orange {
					color: white;
					border: 1px solid #FB8F3D; 
					background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
					background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
					background: -ms-linear-gradient(top, #FDA251, #FB8F3D);
				}

				button.orange:hover {
					border: 1px solid #EB5200;
					background: -webkit-linear-gradient(top, #FD924C, #F9760B); 
					background: -moz-linear-gradient(top, #FD924C, #F9760B); 
					background: -ms-linear-gradient(top, #FD924C, #F9760B); 
					box-shadow: 0 1px #EFEFEF;
				}

				button.orange:active {
					box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
				}

				/* Red Google Button as seen on drive.google.com */
				button.red {
					background: -webkit-linear-gradient(top, #DD4B39, #D14836); 
					background: -moz-linear-gradient(top, #DD4B39, #D14836); 
					background: -ms-linear-gradient(top, #DD4B39, #D14836); 
					border: 1px solid #DD4B39;
					color: white;
					text-shadow: 0 1px 0 #C04131;
				}

				button.red:hover {
					 background: -webkit-linear-gradient(top, #DD4B39, #C53727);
					 background: -moz-linear-gradient(top, #DD4B39, #C53727);
					 background: -ms-linear-gradient(top, #DD4B39, #C53727);
					 border: 1px solid #AF301F;
				}

				button.red:active {
					 box-shadow: inset 0 1px 1px rgba(0,0,0,0.2);
					background: -webkit-linear-gradient(top, #D74736, #AD2719);
					background: -moz-linear-gradient(top, #D74736, #AD2719);
					background: -ms-linear-gradient(top, #D74736, #AD2719);
				}`;
			
			head = document.head || document.getElementsByTagName('head')[0],
			style = document.createElement('style');
			head.appendChild(style);
			style.type = 'text/css';
			if (style.styleSheet){ style.styleSheet.cssText = css; } else { style.appendChild(document.createTextNode(css)); };
		},
		Modal: {
			loadStyle: function(){
				var self = this;
				var css = '';
				
				
				css += `.Monteverde-SDK-modal {
					  position: fixed;
					  top: 0;
					  right: 0;
					  bottom: 0;
					  left: 0;
					  z-index: 20;
					  padding: 30px;
					  width: 100%;
					  height: 100%;
					  margin: 0;
					  padding: 0;
					  opacity: 0;
					  visibility: hidden;
					  transition: visibility 0s linear 0.1s,opacity 0.3s ease;
					}`;
				css += `.Monteverde-SDK-modal.open {
					  visibility: visible;
					  opacity: 1;
					  transition-delay: 0s;
					}`;
				css += `.Monteverde-SDK-overlay {
					  position: fixed;
					  top: 0;
					  left: 0;
					  bottom: 0;
					  right: 0;
					  z-index: 21;
					  background-color: rgba(0, 0, 0, 0.7);
					}`;
				css += `.Monteverde-SDK-close {
					  position: absolute;
					  top: 10px;
					  right: 10px;
					  border: none;
					  outline: none;
					  background: none;
					  font-size: 24px;
					  color: #747474;
					  font-weight: bold;
					}`;
				css += `.Monteverde-SDK-close:hover {
					  color: #000;
					}`;
				css += `.Monteverde-SDK-container {
						position: relative;
						z-index: 22;
						min-width: 400px;
						max-width: 550px;
						height: auto;
						min-height: 200px;
						top: 50%;
						-webkit-transform: translateY(-50%);
						transform: translateY(-50%);
						box-shadow: 0 0 10px #fff;
						margin: 0 auto;
						padding: 30px;
						background-color: #fff;
						text-align: center;
					}`;
				css += `.Monteverde-SDK-hidden {
						display: none;
						visibility: hidden;
					}`;
					
				css += `.modal{
				  position: fixed;
				  top: 0;
				  right: 0;
				  bottom: 0;
				  left: 0;
				  z-index: 20;
				  padding: 30px;
				  width:  100%;
				  height: 100%;
				  margin: 0;
				  padding: 0;
				  opacity: 0;
				  visibility: hidden;
				  transition:visibility 0s linear 0.1s,opacity 0.3s ease;
				  
				  &.open{
					visibility:visible;
					opacity: 1;
					transition-delay:0s;
				  }
				  
				  &__overlay{
					position: fixed;
					top: 0;
					left: 0;
					bottom: 0;
					right: 0;
					z-index: 21;
					background-color: rgba(0,0,0,0.7);
				  }
				  
				  &__close{
					position: absolute;
					top: 10px;
					right: 10px;
					border: none;
					outline: none;
					background: none;
					font-size: 24px;
					color: #747474;
					font-weight: bold;
					
					&:hover{
					  color: #000;
					}
				  }
				  
				  &__container{
					position: relative;
					z-index: 22;
					width: 400px;
					height: 200px;
					top: 50%;
					transform: translateY(-50%);
					box-shadow:  0 0 10px #fff;
					margin: 0 auto;
					padding: 30px;
					background-color: #fff;
					text-align: center;
				  }
				}`;
				
				head = document.head || document.getElementsByTagName('head')[0],
				style = document.createElement('style');
				head.appendChild(style);
				style.type = 'text/css';
				if (style.styleSheet){
					// This is required for IE8 and below.
					style.styleSheet.cssText = css;
				} else {
					style.appendChild(document.createTextNode(css));
				};
			},
			create: function(modal_id = 'form-mv', html_out = 'Monteverde Modal window text'){
				// Uso: Mv.Modal.create('jsModal2', 'Texto o codigo HTML');
				if(document.getElementById(modal_id)){ Mv.Modal.removeElement(modal_id); };			
				var p_1 = document.createElement("p");
				p_1.innerHTML = html_out;
				
				var btn_1 = document.createElement("button");
				btn_1.id = 'Monteverde-SDK-close-' + modal_id;
				btn_1.className = 'Monteverde-SDK-close jsModalClose';
				btn_1.innerHTML = '&#10005;';
				
				var jsModal = document.createElement("div");
				// jsModal.id = 'jsModal';
				jsModal.id = modal_id;
				jsModal.className = 'Monteverde-SDK-modal';
				
				var jsOverlay = document.createElement("div");
				jsOverlay.className = 'Monteverde-SDK-overlay jsOverlay';
				
				var modal__container = document.createElement("div");
				modal__container.className = 'Monteverde-SDK-container';
				
				modal__container.appendChild(p_1);
				modal__container.appendChild(btn_1);
				jsModal.appendChild(jsOverlay);
				jsModal.appendChild(modal__container);
				
				document.getElementsByTagName('body')[0].appendChild(jsModal);
				Mv.Modal.create_link(modal_id);
			},
			removeElement: function(element) {
				var elem = document.getElementById(element);
				elem && elem.parentNode && elem.parentNode.removeChild(elem);
			},
			create_link: function(el){
				var a_1 = document.createElement("a");
				a_1.id = 'popup-' + el;
				a_1.href = '#' + el;
				a_1.className = 'jsModalTrigger Monteverde-SDK-hidden';
				var a_1_text = document.createTextNode('Abrir Modal: ' + el);
				a_1.appendChild(a_1_text);
				document.getElementsByTagName('body')[0].appendChild(a_1);
				
				Mv.ready(Mv.Modal.openModal);
				Mv.ready(Mv.Modal.closeModal);
			},
			eventFire: function(el, etype){
				var elem = document.getElementById(el);
				if (elem != null && elem.fireEvent != null) {
					elem.fireEvent('on' + etype);
				} else {
					var evObj = document.createEvent('Events');
					evObj.initEvent(etype, true, false);
					elem.dispatchEvent(evObj);
				}
			},
			open: function(modal_id){ Mv.Modal.eventFire('popup-' + modal_id, 'click'); },
			openModal: function() {
				var modalTrigger = document.getElementsByClassName('jsModalTrigger');
				/* Set onclick event handler for all trigger elements */
				for(var i = 0; i < modalTrigger.length; i++) {
					modalTrigger[i].onclick = function() {
						var target = this.getAttribute('href').substr(1);
						var modalWindow = document.getElementById(target);
						modalWindow.classList ? modalWindow.classList.add('open') : modalWindow.className += ' ' + 'open'; 
					}
				}
			},
			closeModal: function() {
				/* Get close button */
				var closeButton = document.getElementsByClassName('jsModalClose');
				var closeOverlay = document.getElementsByClassName('jsOverlay');

				/* Set onclick event handler for close buttons */
				  for(var i = 0; i < closeButton.length; i++) {
					closeButton[i].onclick = function() {
					  var modalWindow = this.parentNode.parentNode;

					  modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
					}
				  }   

				/* Set onclick event handler for modal overlay */
				  for(var i = 0; i < closeOverlay.length; i++) {
					closeOverlay[i].onclick = function() {
					  var modalWindow = this.parentNode;

					  modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
					}
				  }  
			},
		},
		ready: function(fn) {
			if (document.readyState != 'loading'){
			  fn();
			} else {
			  document.addEventListener('DOMContentLoaded', fn);
			}
		},
		json_to_url: function(data){
			return Object.keys(data).map(function(k) { return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }).join('&');
		},
		input_to_code: function(target){
			var self = this;
			var params = {};
			for (var k in target){
				if (typeof target[k] !== 'function') {
					if(target[k].name != undefined && target[k].value != undefined && k != "")
						{
							temp_name = target[k].name;
							temp_value = target[k].value;
							params[temp_name] = temp_value;
						}
				}
			}
			return params;
		},
		postLogIn: function(id_form, method, callback){
			console.log("Iniciando post");
			document.getElementById('FG-login-modal-messages').innerHTML = 'Iniciando Ingreso.';
			var s = this;
			var oAlert = document.getElementById(id_form + '-alert-error');
			method = method || "post";
			callback = callback || callback_active;
			var oForm = document.getElementById(id_form);
			var params = s.input_to_code(oForm.elements);
			
			console.log('Enviando parametros de LogIn.');
			console.log(params);
			Mv.api.post('/login', params)
				.then(a => {
					console.log("Respuesta Login.");
					console.log(a);
					console.log(a.config.headers['X-XSRF-TOKEN']);
					console.log(a.data.id);
					
					
					if(a.status == 200 && a.data.id != undefined && a.data.id > 0 && a.config.headers['X-XSRF-TOKEN'] != undefined){
						document.getElementById('FG-login-modal-messages').innerHTML = 'Cargando sesion.';
						Mv.saveSession(a);
						Mv.Modal.eventFire('FG-login-modal-messages', 'click');
					}else{
						if(a.data.code != undefined && a.data.code == 1012){
							document.getElementById('FG-login-modal-messages').innerHTML = 'Datos Invalidos.';
						}
					}
				})
				.catch(b => {
					document.getElementById('FG-login-modal-messages').innerHTML = 'Error Login';
					if(b.response.data.code != undefined && b.response.data.code == 1012){
						document.getElementById('FG-login-modal-messages').innerHTML = 'Datos Invalidos.';
					}
				})
				.finally(function(){
					console.log('finally login');
					console.log(localStorage);
						document.getElementById('FG-login-modal-messages').innerHTML = 'sesion cargada.';
					return callback(Mv._userData);
				});
		},
		saveSession: function(a){
			console.log("SDK - saveSession");
			if(a.status == 200 && a.data.id != undefined && a.data.id > 0 && a.config.headers['X-XSRF-TOKEN'] != undefined){
				Mv._userData.accessToken = a.config.headers['X-XSRF-TOKEN'];
				Mv._userData.status = 'connected';
				Mv._userData.userID = a.data.id;
				Mv._userData.authResponse.userData = a.data;
				
				localStorage.setItem('_userid', a.data.id);
				localStorage.setItem('_token', a.config.headers['X-XSRF-TOKEN']);
			}else{
				localStorage.clear();
			}
		},
		login: function(callback) {
			console.log("Iniciando login SDK");
			var code =  new Date().valueOf();
			var id_form = 'FG-login-modal-form-' + code;
			
			Mv.callback_active = callback;
			Mv.Modal.create('FG-login-modal', `<div class="login-form ">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="card" id="FG-login-modal-messages">
							</div>
							<div class="card">
								<div id="` + id_form + `-alert-error" class="" role="alert"></div>
								<form action="javascript:Mv.postLogIn('` + id_form + `', 'POST', ` + callback + `);" id="` + id_form + `" method="POST">
									<div class="card-body">
										<div class="form-group row">
											<label for="username" class="col-md-4 col-form-label text-md-right">Usuario</label>
											<div class="col-md-6">
												<input type="text" class="form-control" name="username" required autofocus>
											</div>
										</div>

										<div class="form-group row">
											<label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="password" required />
											</div>
										</div>

										<div class="col-md-8 offset-md-2">
											<button type="submit" class="btn btn-primary">
												Ingresar
											</button>
											<a href="#" class="btn btn-link">
												¿Olvidaste tu contraseña?
											</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			`);
			Mv.Modal.open('FG-login-modal');
		},	
	};
	
	try{
		if (!window.MonteverdeAPIInit){
			throw 'MonteverdeAPIInit no encontrado.';
		};
		window.Mv = Mv;
	}
	catch(z){
		console.error(z);
	}
	finally {
		console.log('SDK Monteverde finally.');
		Mv.ready(window.MonteverdeAPIInit);
	}
})(window, undefined);