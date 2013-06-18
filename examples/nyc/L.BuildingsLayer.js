var OSMBuildings=function(){function d(a,b){var g=a[0]-b[0],f=a[1]-b[1];return g*g+f*f}function M(a){for(var b=0,g=0,f=0,e=a.length-3;f<e;f+=2)b+=a[f],g+=a[f+1];a=(a.length-2)/2;return[b/a<<0,g/a<<0]}function Da(a){var b,g,f,e,d=0,m,h;m=0;for(h=a.length-3;m<h;m+=2)b=a[m],g=a[m+1],f=a[m+2],e=a[m+3],d+=b*e-f*g;if("CW"===(0<d/2?"CW":"CCW"))return a;b=[];for(g=a.length-2;0<=g;g-=2)b.push(a[g],a[g+1]);return b}var Ea=Ea||Array,Fa=Fa||Array,h=Math,Na=h.exp,Oa=h.log,Pa=h.sin,Qa=h.cos,va=h.tan,Ra=h.atan,
pa=h.min,wa=h.max,Ga=document,T,ba=function(a){var b,g,f;if(0===a.s)b=g=f=a.l;else{f=0.5>a.l?a.l*(1+a.s):a.l+a.s-a.l*a.s;var e=2*a.l-f;a.h/=360;b=U(e,f,a.h+1/3);g=U(e,f,a.h);f=U(e,f,a.h-1/3)}return new y(255*b<<0,255*g<<0,255*f<<0,a.a)},U=function(a,b,g){0>g&&(g+=1);1<g&&(g-=1);return g<1/6?a+6*(b-a)*g:0.5>g?b:g<2/3?a+6*(b-a)*(2/3-g):a},y=function(a,b,g,f){this.r=a;this.g=b;this.b=g;this.a=4>arguments.length?1:f},h=y.prototype;h.toString=function(){return"rgba("+[this.r<<0,this.g<<0,this.b<<0,this.a.toFixed(2)].join()+
")"};h.setLightness=function(a){var b=y.toHSLA(this);b.l*=a;b.l=Math.min(1,Math.max(0,b.l));return ba(b)};h.setAlpha=function(a){return new y(this.r,this.g,this.b,this.a*a)};y.parse=function(a){var b;a+="";if(~a.indexOf("#")&&(b=a.match(/^#?(\w{2})(\w{2})(\w{2})(\w{2})?$/)))return new y(parseInt(b[1],16),parseInt(b[2],16),parseInt(b[3],16),b[4]?parseInt(b[4],16)/255:1);if(b=a.match(/rgba?\((\d+)\D+(\d+)\D+(\d+)(\D+([\d.]+))?\)/))return new y(parseInt(b[1],10),parseInt(b[2],10),parseInt(b[3],10),b[4]?
parseFloat(b[5]):1);if(b=a.match(/hsla?\(([\d.]+)\D+([\d.]+)\D+([\d.]+)(\D+([\d.]+))?\)/))return ba({h:parseInt(b[1],10),s:parseFloat(b[2]),l:parseFloat(b[3]),a:b[4]?parseFloat(b[5]):1})};y.toHSLA=function(a){var b=a.r/255,g=a.g/255,f=a.b/255,e=Math.max(b,g,f),d=Math.min(b,g,f),m,h=(e+d)/2,t;if(e===d)m=d=0;else{t=e-d;d=0.5<h?t/(2-e-d):t/(e+d);switch(e){case b:m=(g-f)/t+(g<f?6:0);break;case g:m=(f-b)/t+2;break;case f:m=(b-g)/t+4}m/=6}return{h:360*m,s:d,l:h,a:a.a}};T=y;var Ha,h=Math,x=h.sin,E=h.cos,
Sa=h.tan,ca=h.asin,da=h.atan2,V=h.PI,j=180/V,Ta=357.5291/j,Ua=0.98560028/j,Va=1.9148/j,Wa=0.02/j,Xa=3E-4/j,Ya=102.9372/j,ea=23.45/j,Za=280.16/j,$a=360.9856235/j;Ha=function(a,b,g){g=-g/j;b/=j;a=a.valueOf()/864E5-0.5+2440588;var f=Ta+Ua*(a-2451545),e=Va*x(f)+Wa*x(2*f)+Xa*x(3*f),e=f+Ya+e+V,f=ca(x(e)*x(ea)),e=da(x(e)*E(ea),E(e));g=Za+$a*(a-2451545)-g-e;return{altitude:ca(x(b)*x(f)+E(b)*E(f)*E(g)),azimuth:da(x(g),E(g)*x(b)-Sa(f)*E(b))-V/2}};var Ia,P=function(a){var b=parseFloat(a);return~a.indexOf("m")?
b<<0:~a.indexOf("yd")?b*ab<<0:~a.indexOf("ft")?b*fa<<0:~a.indexOf("'")?(a=a.split("'"),a[0]*fa+a[1]*bb<<0):b<<0},u=function(a){a=a.toLowerCase();return"#"===a[0]?a:cb[a]||null},G=function(a){a=a.toLowerCase();return"#"===a[0]?a:db[eb[a]||a]||null},Ja=function(a){return(a=a.tags)&&!a.landuse&&(a.building||a["building:part"])&&(!a.layer||0<=a.layer)},Ka=function(a){if(a){for(var b=[],g,f=0,e=a.length;f<e;f++)g=N[a[f]],b.push(g[0],g[1]);b[b.length-2]!==b[0]&&b[b.length-1]!==b[1]&&b.push(b[0],b[1]);if(!(8>
b.length))return b}},F=function(a){var b=0,g=0;a.height&&(b=P(a.height));!b&&a["building:height"]&&(b=P(a["building:height"]));!b&&a.levels&&(b=a.levels*H<<0);!b&&a["building:levels"]&&(b=a["building:levels"]*H<<0);a.min_height&&(g=P(a.min_height));!g&&a["building:min_height"]&&(g=P(a["building:min_height"]));!g&&a.min_level&&(g=a.min_level*H<<0);!g&&a["building:min_level"]&&(g=a["building:min_level"]*H<<0);var f,e;a["building:material"]&&(f=G(a["building:material"]));a["building:facade:material"]&&
(f=G(a["building:facade:material"]));a["building:cladding"]&&(f=G(a["building:cladding"]));a["building:color"]&&(f=u(a["building:color"]));a["building:colour"]&&(f=u(a["building:colour"]));a["roof:material"]&&(e=G(a["roof:material"]));a["building:roof:material"]&&(e=G(a["building:roof:material"]));a["roof:color"]&&(e=u(a["roof:color"]));a["roof:colour"]&&(e=u(a["roof:colour"]));a["building:roof:color"]&&(e=u(a["building:roof:color"]));a["building:roof:colour"]&&(e=u(a["building:roof:colour"]));return{height:b,
minHeight:g,wallColor:f,roofColor:e}},La=function(a,b,g){a={id:a,footprint:Da(g)};b.height&&(a.height=b.height);b.minHeight&&(a.minHeight=b.minHeight);b.wallColor&&(a.wallColor=b.wallColor);b.roofColor&&(a.roofColor=b.roofColor);ga.push(a)},ab=0.9144,fa=0.3048,bb=0.0254,H=3,cb={black:"#000000",white:"#ffffff",brown:"#8b4513",green:"#00ff7f",grey:"#bebebe",gray:"#bebebe",lightgrey:"#d3d3d3",lightgray:"#d3d3d3",yellow:"#ffff00",red:"#ff0000",blue:"#0000ff"},eb={asphalt:"tar_paper",bitumen:"tar_paper",
block:"stone",bricks:"brick",glas:"glass",glassfront:"glass",grass:"plants",masonry:"stone",granite:"stone",panels:"panel",paving_stones:"stone",plastered:"plaster",rooftiles:"roof_tiles",roofingfelt:"tar_paper",sandstone:"stone",sheet:"canvas",sheets:"canvas",shingle:"tar_paper",shingles:"tar_paper",slates:"slate",steel:"metal",tar:"tar_paper",tent:"canvas",thatch:"plants",tile:"roof_tiles",tiles:"roof_tiles"},db={brick:"#cc7755",bronze:"#ffeecc",canvas:"#fff8f0",concrete:"#999999",copper:"#a0e0d0",
glass:"#e8f8f8",gold:"#ffcc00",plants:"#009933",metal:"#aaaaaa",panel:"#fff8f0",plaster:"#999999",roof_tiles:"#f08060",silver:"#cccccc",slate:"#666666",stone:"#996666",tar_paper:"#333333",wood:"#deb887"},N,Y,ga;Ia=function(a){N={};Y={};ga=[];for(var b,g=0,f=a.length;g<f;g++)switch(b=a[g],b.type){case "node":N[b.id]=[b.lat,b.lon];break;case "way":var e=void 0,d=void 0;Ja(b)?(e=F(b.tags),(d=Ka(b.nodes))&&La(b.id,e,d)):(e=b.tags)&&(!e.highway&&!e.railway&&!e.landuse)&&(Y[b.id]=b);break;case "relation":var h=
e=e=void 0,d=void 0;if(Ja(b)&&("multipolygon"===b.tags.type||"building"===b.tags.type)){a:{for(var e=b.members,d=void 0,h=0,j=e.length;h<j;h++)if(d=e[h],"way"===d.type&&"outer"===d.role){e=d;break a}e=void 0}if(e&&(b=F(b.tags),e=Y[e.ref]))if(h=F(e.tags),d=Ka(e.nodes)){j=void 0;for(j in b)h[j]||(h[j]=b[j]);La(e.id,h,d)}}}return ga};var ha=Math.PI,Ma=ha/2,fb=ha/4,gb=180/ha,hb=256,ib="latitude",jb="longitude",h=function(){function a(a,b){var c={};a/=E;b/=E;c[ib]=0>=b?90:1<=b?-90:gb*(2*Ra(Na(ha*(1-2*
b)))-Ma);c[jb]=360*(1===a?1:(a%1+1)%1)-180;return c}function b(a,b){return a.replace(/\{ *([\w_]+) *\}/g,function(a,J){return b[J]||a})}function g(a,b){var c=new XMLHttpRequest;c.onreadystatechange=function(){4===c.readyState&&c.status&&!(200>c.status||299<c.status)&&b&&c.responseText&&b(JSON.parse(c.responseText))};c.open("GET",a);c.send(null);return c}function f(){ia.render();qa.render();e()}function e(){v.clearRect(0,0,t,w);if(!(Q<H||ja)){var a,b,c,g,f,e,xa,B,l,n=qa.MAX_HEIGHT,p=[ka+z,la+A],I,
q,k,r,W,j;C.renderItems.sort(function(a,J){return d(J.center,p)/J.height-d(a.center,p)/a.height});a=0;for(b=C.renderItems.length;a<b;a++)if(f=C.renderItems[a],!(f.height<=n)){q=!1;e=f.footprint;I=[];c=0;for(g=e.length-1;c<g;c+=2)I[c]=B=e[c]-z,I[c+1]=l=e[c+1]-A,q||(q=0<B&&B<t&&0<l&&l<w);if(q){c=1>f.scale?f.height*f.scale:f.height;e=Z/(Z-c);f.minHeight&&(c=1>f.scale?f.minHeight*f.scale:f.minHeight,xa=Z/(Z-c));B=[];c=0;for(g=I.length-3;c<g;c+=2)l=I[c],k=I[c+1],q=I[c+2],r=I[c+3],W=m(l,k,e),j=m(q,r,e),
f.minHeight&&(k=m(l,k,xa),r=m(q,r,xa),l=k.x,k=k.y,q=r.x,r=r.y),(q-l)*(W.y-k)>(W.x-l)*(r-k)&&(v.fillStyle=l<q&&k<r||l>q&&k>r?f.altColor||ma:f.wallColor||G,h([q,r,l,k,W.x,W.y,j.x,j.y])),B[c]=W.x,B[c+1]=W.y;v.fillStyle=f.roofColor||na;v.strokeStyle=f.altColor||ma;h(B,!0)}}}}function h(a,b){if(a.length){v.beginPath();v.moveTo(a[0],a[1]);for(var c=2,f=a.length;c<f;c+=2)v.lineTo(a[c],a[c+1]);v.closePath();b&&v.stroke();v.fill()}}function m(a,b,c){return{x:(a-ka)*c+ka<<0,y:(b-la)*c+la<<0}}function j(a){Q=
a;E=hb<<Q;a=Q;var b=H,c=U;a=pa(wa(a,b),c);O=1-pa(wa(0+0.3*((a-b)/(c-b)),0),0.3);G=K.setAlpha(O)+"";ma=u.setAlpha(O)+"";na=$.setAlpha(O)+""}var t=0,w=0,x=0,y=0,z=0,A=0,Q,E,v,K=new T(200,190,180),u=K.setLightness(0.8),$=K.setLightness(1.2),G=K+"",ma=u+"",na=$+"",P,O=1,H=15,U=20,V,ka,la,Z,ja,N=new Date,aa={},F={add:function(a,b){aa[a]={data:b,time:Date.now()}},get:function(a){return aa[a]&&aa[a].data},purge:function(){N.setMinutes(N.getMinutes()-5);for(var a in aa)aa[a].time<N&&delete aa[a]}},C,ga=function(a){return function(b){Y(b,
a)}},Y=function(a,b){if(a){var c;if("FeatureCollection"===a.type){c=a.features;var f,g,d,e,h=[],l,n,p,I,q,k,r,j;f=0;for(g=c.length;f<g;f++)if(l=c[f],"Feature"===l.type&&(n=l.geometry,l=l.properties,"LineString"===n.type&&(k=p.length-1,p[0][0]===p[k][0]&&p[0][1]===p[k][1]&&(p=n.coordinates)),"Polygon"===n.type&&(p=n.coordinates),"MultiPolygon"===n.type&&(p=n.coordinates[0]),p)){if(l.color||l.wallColor)I=l.color||l.wallColor;l.roofColor&&(q=l.roofColor);n=p[0];j=[];r=l.height;d=k=0;for(e=n.length;d<
e;d++)j.push(n[d][1],n[d][0]),k+=r||n[d][2]||0;d={id:l.id||j[0]+","+j[1],footprint:Da(j)};k&&(d.height=k/n.length<<0);l.minHeight&&(d.minHeight=l.minHeight);I&&(d.wallColor=I);q&&(d.roofColor=q);h.push(d)}c=h}else a.osm3s&&(c=Ia(a.elements));b&&F.add(b,c);ba(c,!0)}},ba=function(a,b){var c,d,g,e,h,B,l=[],n,p,j,q,k,r,m,s,t,x=U-Q;g=0;for(e=a.length;g<e;g++)if(t=s=m=null,n=a[g],j=3*(n.height||15)>>x)if(q=3*n.minHeight>>x,!(q>V)){p=n.footprint;k=new Ea(p.length);h=0;for(B=p.length-1;h<B;h+=2)c=p[h+1],
d=pa(1,wa(0,0.5-Oa(va(fb+Ma*p[h]/180))/ha/2)),c=(c/360+0.5)*E<<0,d=d*E<<0,k[h]=c,k[h+1]=d;h=k;B=h.length/2;p=new Fa(B);k=0;c=B-1;var y=d=void 0,w=void 0,u=void 0,v=[],D=[],G=[];for(p[k]=p[c]=1;c;){y=0;for(d=k+1;d<c;d++){var w=h[2*d],H=h[2*d+1],z=h[2*k],A=h[2*k+1],K=h[2*c],N=h[2*c+1],R=K-z,S=N-A,F=void 0;if(0!==R||0!==S)F=((w-z)*R+(H-A)*S)/(R*R+S*S),1<F?(z=K,A=N):0<F&&(z+=R*F,A+=S*F);R=w-z;S=H-A;w=R*R+S*S;w>y&&(u=d,y=w)}2<y&&(p[u]=1,v.push(k),D.push(u),v.push(u),D.push(c));k=v.pop();c=D.pop()}for(d=
0;d<B;d++)p[d]&&G.push(h[2*d],h[2*d+1]);k=G;if(!(8>k.length)){if(n.wallColor&&(r=T.parse(n.wallColor)))m=r.setAlpha(O),s=""+m.setLightness(0.8),m=""+m;if(n.roofColor&&(r=T.parse(n.roofColor)))t=""+r.setAlpha(O);l.push({id:n.id,footprint:k,height:pa(j,V),minHeight:q,wallColor:m,altColor:s,roofColor:t,center:M(k)})}}e=0;for(n=l.length;e<n;e++)g=l[e],ra[g.id]||(g.scale=b?0:1,oa.renderItems.push(l[e]),ra[g.id]=1);P||(P=setInterval(function(){for(var a,b=!1,c=0,J=C.renderItems.length;c<J;c++)a=C.renderItems[c],
1>a.scale&&(a.scale+=0.1,1<a.scale&&(a.scale=1),b=!0);f();b||(clearInterval(P),P=null)},33))},ya,ra={},oa={renderItems:[],load:function(a){ya=a;oa.update()},update:function(){if(ya&&!(15>Q)){var J=a(z,A),d=a(z+t,A+w),c=0.0075*(J.latitude/0.0075<<0)+0.0075,f=0.015*(d.longitude/0.015<<0)+0.015,d=0.0075*(d.latitude/0.0075<<0),J=0.015*(J.longitude/0.015<<0);F.purge();oa.renderItems=[];ra={};for(var e,h,j;d<=c;d+=0.0075)for(e=J;e<=f;e+=0.015)j=d+","+e,(h=F.get(j))?ba(h):g(b(ya,{n:(1E4*(d+0.0075)<<0)/1E4,
e:(1E4*(e+0.015)<<0)/1E4,s:(1E4*d<<0)/1E4,w:(1E4*e<<0)/1E4}),ga(j))}},set:function(a){oa.renderItems=[];ra={};Y(a)}};C=oa;var ia,ta=function(a,b,c){return{x:a+sa.x*c,y:b+sa.y*c}},s,ca=!0,da=new T(0,0,0),ea=null,sa={x:0,y:0},za={setContext:function(a){s=a;za.setDate((new Date).setHours(10))},enable:function(a){ca=!!a},render:function(){var b,d,c,g;s.clearRect(0,0,t,w);if(ca&&!(Q<H||ja))if(b=a(z+x,A+y),b=Ha(ea,b.latitude,b.longitude),!(0>=b.altitude)){d=1/va(b.altitude);c=0.4/d;sa.x=Qa(b.azimuth)*d;
sa.y=Pa(b.azimuth)*d;da.a=c;g=da+"";var f,e,h,j,l,n,p,m,q,k,r,u,v=[];s.beginPath();b=0;for(d=C.renderItems.length;b<d;b++){e=C.renderItems[b];m=!1;h=e.footprint;p=[];c=0;for(f=h.length-1;c<f;c+=2)p[c]=l=h[c]-z,p[c+1]=n=h[c+1]-A,m||(m=0<l&&l<t&&0<n&&n<w);if(m){h=1>e.scale?e.height*e.scale:e.height;e.minHeight&&(j=1>e.scale?e.minHeight*e.scale:e.minHeight);l=null;c=0;for(f=p.length-3;c<f;c+=2)n=p[c],q=p[c+1],m=p[c+2],k=p[c+3],r=ta(n,q,h),u=ta(m,k,h),e.minHeight&&(q=ta(n,q,j),k=ta(m,k,j),n=q.x,q=q.y,
m=k.x,k=k.y),(m-n)*(r.y-q)>(r.x-n)*(k-q)?(1===l&&s.lineTo(n,q),l=0,c||s.moveTo(n,q),s.lineTo(m,k)):(0===l&&s.lineTo(r.x,r.y),l=1,c||s.moveTo(r.x,r.y),s.lineTo(u.x,u.y));s.closePath();v.push(p)}}s.fillStyle=g;s.fill();s.globalCompositeOperation="destination-out";s.beginPath();b=0;for(d=v.length;b<d;b++){j=v[b];s.moveTo(j[0],j[1]);c=2;for(f=j.length;c<f;c+=2)s.lineTo(j[c],j[c+1]);s.lineTo(j[0],j[1]);s.closePath()}s.fillStyle="#00ff00";s.fill();s.globalCompositeOperation="source-over"}},setDate:function(a){ea=
a;za.render()}};ia=za;var qa,D,fa={MAX_HEIGHT:8,setContext:function(a){D=a},render:function(){D.clearRect(0,0,t,w);if(!(Q<H||ja)){var a,b,c,d,e,f,g,h,j;D.beginPath();a=0;for(b=C.renderItems.length;a<b;a++)if(c=C.renderItems[a],!(c.height>fa.MAX_HEIGHT)){j=!1;e=c.footprint;h=[];c=0;for(d=e.length-1;c<d;c+=2)h[c]=f=e[c]-z,h[c+1]=g=e[c+1]-A,j||(j=0<f&&f<t&&0<g&&g<w);if(j){c=0;for(d=h.length-3;c<d;c+=2)j=h[c],e=h[c+1],c?D.lineTo(j,e):D.moveTo(j,e);D.closePath()}}D.fillStyle=na;D.strokeStyle=ma;D.stroke();
D.fill()}}};qa=fa;var Aa,Ba=function(){var a=Ga.createElement("CANVAS");a.style.webkitTransform="translate3d(0,0,0)";a.style.imageRendering="optimizeSpeed";a.style.position="absolute";a.style.left=0;a.style.top=0;var b=a.getContext("2d");b.lineCap="round";b.lineJoin="round";b.lineWidth=1;b.mozImageSmoothingEnabled=!1;b.webkitImageSmoothingEnabled=!1;ua.push(a);X.appendChild(a);return b},X=Ga.createElement("DIV");X.style.pointerEvents="none";X.style.position="absolute";X.style.left=0;X.style.top=0;
var ua=[];ia.setContext(Ba());qa.setContext(Ba());v=Ba();Aa={appendTo:function(a){a.appendChild(X);return X},setSize:function(a,b){for(var c=0,d=ua.length;c<d;c++)ua[c].width=a,ua[c].height=b}};if(window.DeviceMotionEvent){var Ca=Math.abs;window.addEventListener("devicemotion",function(a){var b;console.log(a);if(a=a.accelerationIncludingGravity)if(2<Ca(a.x)||2<Ca(a.y)||2<Ca(a.z))switch(window.orientation){case -90:b=a.x;a.x=a.y;a.y=-b;break;case 90:b=a.x;a.x=-a.y;a.y=b;break;case 180:case -180:a.x*=
-1,a.y*=-1}})}this.setStyle=function(a){a=a||{};if(a.color||a.wallColor)K=T.parse(a.color||a.wallColor),G=K.setAlpha(O)+"",u=K.setLightness(0.8),ma=u.setAlpha(O)+"",$=K.setLightness(1.2),na=$.setAlpha(O)+"";a.roofColor&&($=T.parse(a.roofColor),na=$.setAlpha(O)+"");void 0!==a.shadows&&ia.enable(a.shadows);f();return this};this.setCamOffset=function(a,b){ka=x+a;la=w+b};this.setMaxZoom=function(a){U=a};this.setDate=function(a){ia.setDate(a);return this};this.appendTo=function(a){return Aa.appendTo(a)};
this.loadData=function(a){C.load(a);return this};this.setData=function(a){C.set(a);return this};this.onMoveEnd=function(){f();C.update()};this.onZoomEnd=function(a){ja=!1;j(a.zoom);C.update();f()};this.onZoomStart=function(){ja=!0;f()};this.setOrigin=function(a,b){z=a;A=b};this.setSize=function(a,b){t=a;w=b;x=t/2<<0;y=w/2<<0;ka=x;la=w;Z=t/(1.5/(window.devicePixelRatio||1))/va(45)<<0;Aa.setSize(t,w);V=Z-50};this.setZoom=j;this.render=e};h.VERSION="0.1.8a";h.ATTRIBUTION='&copy; <a href="http://osmbuildings.org">OSM Buildings</a>';
h.OSM_XAPI_URL="http://overpass-api.de/api/interpreter?data=[out:json];(way[%22building%22]({s},{w},{n},{e});node(w);way[%22building:part%22=%22yes%22]({s},{w},{n},{e});node(w);relation[%22building%22]({s},{w},{n},{e});way(r);node(w););out;";return h}();
L.BuildingsLayer=L.Class.extend({map:null,osmb:null,container:null,blockMoveEvent:null,lastX:0,lastY:0,initialize:function(d){L.Util.setOptions(this,d)},onMove:function(){var d=L.DomUtil.getPosition(this.map._mapPane);this.osmb.setCamOffset(this.lastX-d.x,this.lastY-d.y);this.osmb.render()},onMoveEnd:function(){if(this.blockMoveEvent)this.blockMoveEvent=!1;else{var d=L.DomUtil.getPosition(this.map._mapPane),M=this.map.getPixelOrigin();this.lastX=d.x;this.lastY=d.y;this.container.style.left=-d.x+"px";
this.container.style.top=-d.y+"px";this.osmb.setCamOffset(0,0);this.osmb.setSize(this.map._size.x,this.map._size.y);this.osmb.setOrigin(M.x-d.x,M.y-d.y);this.osmb.onMoveEnd()}},onZoomStart:function(){this.osmb.onZoomStart()},onZoomEnd:function(){var d=L.DomUtil.getPosition(this.map._mapPane),M=this.map.getPixelOrigin();this.osmb.setOrigin(M.x-d.x,M.y-d.y);this.osmb.onZoomEnd({zoom:this.map._zoom});this.blockMoveEvent=!0},addTo:function(d){d.addLayer(this);return this},onAdd:function(d){this.map=d;
d=this.map._panes.overlayPane;this.osmb?d.appendChild(this.container):(this.osmb=new OSMBuildings,this.container=this.osmb.appendTo(d),this.osmb.maxZoom=this.map._layersMaxZoom);d=L.DomUtil.getPosition(this.map._mapPane);var M=this.map.getPixelOrigin();this.osmb.setSize(this.map._size.x,this.map._size.y);this.osmb.setOrigin(M.x-d.x,M.y-d.y);this.osmb.setZoom(this.map._zoom);this.container.style.left=-d.x+"px";this.container.style.top=-d.y+"px";this.map.on({move:this.onMove,moveend:this.onMoveEnd,
zoomstart:this.onZoomStart,zoomend:this.onZoomEnd},this);this.map.attributionControl.addAttribution(OSMBuildings.ATTRIBUTION);this.osmb.render()},onRemove:function(d){d.attributionControl.removeAttribution(OSMBuildings.ATTRIBUTION);d.off({move:this.onMove,moveend:this.onMoveEnd,zoomstart:this.onZoomStart,zoomend:this.onZoomEnd},this);this.container.parentNode.removeChild(this.container)},setStyle:function(d){this.osmb.setStyle(d);return this},setDate:function(d){this.osmb.setDate(d);return this},
load:function(d){this.osmb.loadData(d);return this},geoJSON:function(d){this.osmb.setData(d);return this}});
