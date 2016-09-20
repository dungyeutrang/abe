if (self.CavalryLogger) { CavalryLogger.start_js(["dmdfd"]); }

__d('PhotoResizeMath',[],(function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h={getScaledPhotoDimensions:function i(j,k,l,m,n){var o=j/k,p=l/m;if(l&&m&&n==='stretch')return {width:l,height:m};if(!l&&m||n==='contain'!==o>=p)return {width:m*o,height:m};if(l)return {width:l,height:l/o};return {width:j,height:k};}};f.exports=h;}),null);
__d('PixelzFocus',[],(function a(b,c,d,e,f,g){'use strict';if(c.__markCompiled)c.__markCompiled();var h={search:function i(j,k){var l=0,m=j.length-1;while(l<=m){var n=l+Math.floor((m-l)/2),o=j[n];if(o>k){m=n-1;}else if(o<k){l=n+1;}else return n;}return Math.min(l,m);},forceSpecificPoint:function i(j,k,l){var m=1e-09,n=h.search(j,k-l-m)+1,o=h.search(j,k+l);return j.slice(n,o+1);},findBiggestSets:function i(j,k){var l=[],m=-1;for(var n=0;n<j.length;++n){var o=j[n],p=n,q=h.search(j,o+k),r=q-p;if(r>m)l=[];if(r>=m){m=r;l.push({low:p,high:q});}}return l;},getBestSet:function i(j,k,l){var m=-1,n=null;for(var o=0;o<k.length;++o){var p=k[o],q=j[p.low],r=j[p.high],s=q+(r-q)/2,t=Math.min(q-(s-l),s+l-r);if(t>m){m=t;n=p;}}return n;},getFocusFromSet:function i(j,k){var l=j[k.low],m=j[k.high];return l+(m-l)/2;},clampFocus:function i(j,k){var l=k/2,m=1-k/2;if(j<l)return l;if(j>m)return m;return j;},convertFromCenterToCSS:function i(j,k){if(Math.abs(1-k)<1e-05)return 0;return (j-k/2)/(1-k);},convertFromCSSToCenter:function i(j,k){return j*(1-k)+k/2;},getVisible:function i(j,k){if(j<k)return j/k;return k/j;},getHidden:function i(j,k){return 1-h.getVisible(j,k);},focusHorizontally:function i(j,k){return j<k;},convertVectorFromCenterToCSS:function i(j,k,l){var m=h.focusHorizontally(k,l),n=void 0;if(m){n=j.x/100;}else n=j.x/100;var o=h.convertFromCenterToCSS(n,h.getVisible(k,l));if(m){return {x:o,y:0};}else return {x:0,y:o};},getCropRect:function i(j,k,l){var m=h.focusHorizontally(k,l),n=h.getVisible(k,l);if(m){var o=(1-n)*j.x;return {left:o,top:0,width:n,height:1};}else{var p=(1-n)*j.y;return {left:0,top:p,width:1,height:n};}}};f.exports=h;}),null);
__d('loadImage',[],(function a(b,c,d,e,f,g){'use strict';if(c.__markCompiled)c.__markCompiled();function h(i,j){var k=new Image();k.onload=function(){j(k.width,k.height,k);};k.src=i;}f.exports=h;}),null);
__d('Pixelz.react',['cx','arrayContains','loadImage','joinClasses','React','PhotoResizeMath','PixelzFocus'],(function a(b,c,d,e,f,g,h){'use strict';if(c.__markCompiled)c.__markCompiled();var i=c('React').PropTypes,j=c('React').createClass({displayName:'Pixelz',propTypes:{width:i.number,height:i.number,resizeMode:i.oneOf(['contain','cover','stretch']),alt:i.string,letterbox:i.bool,borderRadius:i.number,insetBorderColor:i.string,animated:i.bool,upscale:i.bool,cropRect:function k(l,m,n){var o=l[m],p='Invalid prop `'+m+'` supplied to `'+n+'`, expected a rectangle with values normalized '+'between 0 and 1.';if(o.left<0||o.top<0||o.width<0||o.height<0||o.left+o.width>1||o.top+o.height>1)return new Error(p);},focus:function k(l,m,n){var k=l[m],o='Invalid prop `'+m+'` supplied to `'+n+'`, expected either a {x, y, type} vector where type '+'is `css` or `center` or an array of {x, y} vectors. All the vectors '+'have with values normalized between 0 and 1.';if(Array.isArray(k)){for(var p=0;p<k.length;++p)if(!(k[p].x>=0&&k[p].x<=1)||!(k[p].y>=0&&k[p].y<=1))return new Error(o);}else{if(!k.type)k.type='css';if(!(k.x>=0&&k.x<=1)||!(k.y>=0&&k.y<=1)||!c('arrayContains')(['center','css'],k.type))return new Error(o);}}},getDefaultProps:function k(){return {resizeMode:'cover',alt:'',letterbox:true,upscale:true,cropRect:{width:1,height:1,top:0,left:0},focus:{x:.5,y:.5,type:'css'}};},getInitialState:function k(){return {srcDimensions:{}};},getSrcDimensions:function k(){var l=this.props.src,m=this.state.srcDimensions[l];if(m)return m;c('loadImage')(l,function(n,o){var p={};p[l]={width:n,height:o};this.isMounted()&&this.setState({srcDimensions:p});}.bind(this));return null;},getCropSrcDimensions:function k(){var l=this.getSrcDimensions();return {width:l.width*this.props.cropRect.width,height:l.height*this.props.cropRect.height};},getUpscaleCropDimensions:function k(){var l=this.getCropSrcDimensions();return c('PhotoResizeMath').getScaledPhotoDimensions(l.width,l.height,this.props.width,this.props.height,this.props.resizeMode);},getCropDimensions:function k(){var l=this.getUpscaleCropDimensions(),m=this.getCropSrcDimensions();if(!this.props.upscale)return {width:Math.min(l.width,m.width),height:Math.min(l.height,m.height)};return l;},getCropAspectRatio:function k(){var l=this.getCropDimensions();return l.width/l.height;},getContainerDimensions:function k(){if(this.props.letterbox&&this.props.width&&this.props.height)return {width:this.props.width,height:this.props.height};return this.getCropDimensions();},getContainerAspectRatio:function k(){var l=this.getContainerDimensions();return l.width/l.height;},getContainerPosition:function k(){return {left:0,top:0};},getFocus:function k(){var l=this.props.focus;if(!Array.isArray(l)&&l.type==='css')return {x:l.x,y:l.y};var m=this.getContainerAspectRatio(),n=this.getCropAspectRatio(),o=c('PixelzFocus').getVisible(m,n),p=c('PixelzFocus').focusHorizontally(m,n),q=void 0;if(!Array.isArray(l)){q=c('PixelzFocus').convertFromCenterToCSS(p?l.x:l.y,o);}else{var r=l.map(function(u){return p?u.x:u.y;});r.sort();var s=c('PixelzFocus').findBiggestSets(r,o),t=c('PixelzFocus').getBestSet(r,s,o);q=c('PixelzFocus').getFocusFromSet(r,t);}return {x:p?q:.5,y:p?.5:q};},getCropPosition:function k(){var l=this.getCropDimensions(),m=this.getContainerDimensions(),n=this.getFocus();return {left:n.x*(m.width-l.width),top:n.y*(m.height-l.height)};},getScaleDimensions:function k(){var l=this.getCropDimensions();return {width:l.width/this.props.cropRect.width,height:l.height/this.props.cropRect.height};},getScalePosition:function k(){var l=this.getScaleDimensions();return {left:-l.width*this.props.cropRect.left,top:-l.height*this.props.cropRect.top};},getClipCropRectangle:function k(){var l=this.getContainerDimensions(),m=this.getCropDimensions(),n=this.getContainerPosition(),o=this.getCropPosition(),p=Math.max(n.left,o.left),q=Math.max(n.top,o.top),r=Math.min(n.top+l.height,o.top+m.height),s=Math.min(n.left+l.width,o.left+m.width);return {left:p,top:q,width:s-p,height:r-q};},getClipCropPosition:function k(){var l=this.getClipCropRectangle();return {left:l.left,top:l.top};},getClipCropDimensions:function k(){var l=this.getClipCropRectangle();return {width:l.width,height:l.height};},getClipScalePosition:function k(){var l=this.getScalePosition(),m=this.getClipCropPosition(),n=this.getCropPosition();return {left:l.left+(n.left-m.left),top:l.top+(n.top-m.top)};},getClipScaleDimensions:function k(){return this.getScaleDimensions();},areDimensionsEqual:function k(l,m){return l.width===m.width&&l.height===m.height;},shouldAddAllNodesAndStyles:function k(){return this.props.animated;},hasCrop:function k(){if(this.shouldAddAllNodesAndStyles())return true;var l=this.getContainerDimensions(),m=this.getClipCropDimensions(),n=this.getClipScaleDimensions();if(this.areDimensionsEqual(l,m)||this.areDimensionsEqual(m,n))return false;return true;},hasContainer:function k(){if(this.shouldAddAllNodesAndStyles()||this.hasInsetBorder())return true;var l=this.getContainerDimensions(),m=this.getClipScaleDimensions();if(this.areDimensionsEqual(l,m))return false;return true;},hasInsetBorder:function k(){return this.shouldAddAllNodesAndStyles()||this.props.insetBorderColor;},applyPositionStyle:function k(l,m){if(this.shouldAddAllNodesAndStyles()||m.left)l.left=Math.round(m.left);if(this.shouldAddAllNodesAndStyles()||m.top)l.top=Math.round(m.top);},applyDimensionsStyle:function k(l,m){l.width=Math.round(m.width);l.height=Math.round(m.height);},applyBorderRadiusStyle:function k(l){if(this.shouldAddAllNodesAndStyles()||this.props.borderRadius)l.borderRadius=this.props.borderRadius||0;},getScaleStyle:function k(){var l={},m=this.getClipCropDimensions(),n=this.getClipScaleDimensions();if(this.shouldAddAllNodesAndStyles()||!this.areDimensionsEqual(m,n)){this.applyPositionStyle(l,this.getClipScalePosition());}else this.applyPositionStyle(l,this.getClipCropPosition());this.applyDimensionsStyle(l,this.getClipScaleDimensions());this.applyBorderRadiusStyle(l);return l;},getCropStyle:function k(){var l={};this.applyPositionStyle(l,this.getClipCropPosition());this.applyDimensionsStyle(l,this.getClipCropDimensions());this.applyBorderRadiusStyle(l);return l;},getInsetBorderStyle:function k(){var l={borderColor:this.props.insetBorderColor||'transparent'};this.applyPositionStyle(l,this.getClipCropPosition());this.applyDimensionsStyle(l,this.getClipCropDimensions());this.applyBorderRadiusStyle(l);return l;},getContainerStyle:function k(){var l={};this.applyDimensionsStyle(l,this.getContainerDimensions());this.applyBorderRadiusStyle(l);return l;},getScale:function k(){var l=this.getScaleStyle(),m=l.width,n=l.height;l=babelHelpers['extends']({},l);delete l.width;delete l.height;return (c('React').createElement('img',babelHelpers['extends']({},this.props,{alt:this.props.alt,className:c('joinClasses')(this.props.className,"_56wb"+(this.shouldAddAllNodesAndStyles()?' '+"_56t5":'')),src:this.props.src,style:babelHelpers['extends']({},this.props.style||{},l),width:m,height:n})));},getCrop:function k(){var l=this.getScale();if(!this.hasCrop())return l;return (c('React').createElement('div',{className:"_56ma"+(this.shouldAddAllNodesAndStyles()?' '+"_56t5":''),style:this.getCropStyle()},l));},getInsetBorder:function k(){if(!this.hasInsetBorder())return null;return (c('React').createElement('div',{className:"_56lv"+(this.shouldAddAllNodesAndStyles()?' '+"_56t5":''),style:this.getInsetBorderStyle()}));},getContainer:function k(){var l=this.getCrop();if(!this.hasContainer())return l;var m=this.getInsetBorder();return (c('React').createElement('div',{className:"_56jj"+(this.shouldAddAllNodesAndStyles()?' '+"_56t5":''),'data-skipchecker':null,style:this.getContainerStyle()},l,m));},render:function k(){var l=this.getSrcDimensions();if(!l)return c('React').createElement('span',{'data-skipchecker':null});return this.getContainer();}});f.exports=j;}),null);
__d('Facepile.react',['cx','fbt','ix','intlSummarizeNumber','joinClasses','HovercardLink','Image.react','Link.react','List.react','Pixelz.react','React'],(function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k=c('React').PropTypes,l={small:24,medium:32,large:50},m=c('React').createClass({displayName:'Facepile',defaultProps:{moreColor:'blue',moreCount:0,showHovercard:false},propTypes:{className:k.string,moreColor:k.oneOf(['blue','gray']),moreCount:k.number,moreDialogLink:k.string,morePageLink:k.string,numFaces:k.number,onFaceClick:k.func,onComponentDidMount:k.func,profiles:k.arrayOf(k.shape({URL:k.string,name:k.string.isRequired,uniqueID:k.any.isRequired,profilePicURI:k.any.isRequired})).isRequired,showHovercard:k.bool,size:k.oneOf([28,'small','medium','large']).isRequired},_onFaceClick:function n(o,p){if(this.props.onFaceClick)this.props.onFaceClick(o,p);},componentDidMount:function n(){if(this.props.onComponentDidMount)this.props.onComponentDidMount();},getPicSize:function n(){return l[this.props.size]||this.props.size;},renderFace:function n(o,p){var q=this.getPicSize(),r=c('HovercardLink').constructEndpoint({id:o.uniqueID}).toString();return (c('React').createElement('li',{className:"_43q7",key:o.uniqueID,onClick:this._onFaceClick.bind(this,o,p)},c('React').createElement(c('Link.react'),{href:o.URL,'aria-label':o.name,'data-hover':!this.props.showHovercard?'tooltip':null,'data-hovercard':this.props.showHovercard?r:null,'data-tooltip-content':o.name,className:"_2rt_ link",'data-ignoreclass':"_2rt_",'data-tooltip-alignh':'left'},c('React').createElement(c('Image.react'),{src:o.profilePicURI,width:q,height:q,className:'img'}))));},renderMore:function n(){if(!this.props.moreCount)return null;var o=this.props.numFaces!=null&&this.props.numFaces<=this.props.profiles.length?this.props.moreCount+1:this.props.moreCount,p=c('intlSummarizeNumber')(o,0),q=p.length,r;if(o===0||this.props.size==='small'&&q>2||this.props.size===28&&q>3||this.props.size==='medium'&&q>3||this.props.size==='large'&&q>6){r=c('React').createElement(c('Image.react'),{src:j('/images/questions/ellipsis.png')});}else r='+'+p;var s;if(o===1){s=i._("1 ng\u01b0\u1eddi kh\u00e1c");}else s=i._("{num} ng\u01b0\u1eddi kh\u00e1c",[i.param('num',o)]);var t=c('joinClasses')("_43q8"+(' '+"_43q7")+(q<2?' '+"_43qa":'')+(q===2?' '+"_43qb":'')+(q===3?' '+"_43qd":'')+(q>3?' '+"_43qe":'')+(this.props.moreColor==='blue'?' '+"_49c8":'')+(this.props.moreColor==='gray'?' '+"_49cb":''));return (c('React').createElement('li',{className:t},c('React').createElement('a',{'data-hover':'tooltip','data-tooltip-position':'right','data-tooltip-content':s,ajaxify:this.props.moreDialogLink,href:this.props.morePageLink,role:'button',rel:'dialog'},r)));},render:function n(){var o=c('joinClasses')(this.props.className,"_43qm"+(this.props.size==28?' '+"_3cxu":'')+(this.props.size=='small'?' '+"_43q9":'')+(this.props.size=='medium'?' '+"_43qc":'')+(this.props.size=='large'?' '+"_43qf":'')),p=this.props.numFaces==undefined?this.props.profiles:this.props.profiles.slice(0,this.props.moreCount?this.props.numFaces-1:this.props.numFaces);return (c('React').createElement('div',{className:o,style:this.props.style},c('React').createElement(c('List.react'),{className:"_4cg3",direction:'horizontal',spacing:'none',border:'none'},p.map(this.renderFace),this.renderMore())));}});f.exports=m;}),null);