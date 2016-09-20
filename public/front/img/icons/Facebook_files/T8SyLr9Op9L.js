if (self.CavalryLogger) { CavalryLogger.start_js(["sEHHg"]); }

__d('TabBarItem.react',['cx','React','ReactDOM','Focus','Event','Keys','joinClasses'],(function a(b,c,d,e,f,g,h){var i,j;if(c.__markCompiled)c.__markCompiled();var k=c('React').PropTypes;i=babelHelpers.inherits(l,c('React').Component);j=i&&i.prototype;function l(){var m,n;'use strict';for(var o=arguments.length,p=Array(o),q=0;q<o;q++)p[q]=arguments[q];return n=(m=j.constructor).call.apply(m,[this].concat(p)),this.$TabBarItem1=function(r,s){var t=this.props,u=t.className,v=t.href,w=t.ajaxify,x=t.tabIndex,y=t.rel,z=t.target,aa=t.selected,ba=t.wrapper,ca=t.mockSpacebarClick;v=v||'#';var da={};if(ca)da.onKeyDown=this.onKeyDown;var ea=c('React').createElement('a',{ref:'tab',ajaxify:w,href:v,role:'tab',rel:y,target:z,tabIndex:x,className:s,'aria-selected':aa},this.props.children);return (c('React').createElement(ba,babelHelpers['extends']({},this.props,{tabIndex:null,className:c('joinClasses')(u,r),role:'presentation'}),c('React').cloneElement(ea,da)));}.bind(this),this.$TabBarItem2=function(r){var s=this.props,t=s.className,u=s.href,v=s.selected,w=s.mockSpacebarClick;u=u||'#';var x={};if(w)x.onKeyDown=this.onKeyDown;var y=c('React').createElement('a',babelHelpers['extends']({},this.props,{href:u,ref:'tab',role:'tab',className:c('joinClasses')(t,r),'aria-selected':v}),this.props.children);return c('React').cloneElement(y,x);}.bind(this),this.focus=function(){if(this.props.focused)c('Focus').set(this.refs.tab);}.bind(this),this.onKeyDown=function(event){var r=c('Event').getKeyCode(event);if(r===c('Keys').SPACE&&this.refs.tab){c('ReactDOM').findDOMNode(this.refs.tab).click();c('Event').prevent(event);}}.bind(this),n;}l.prototype.render=function(){'use strict';var m=this.props,n=m.selected,o=m.focused,p=m.hideFocusRing,q=m.shouldWrapTab,r="_45hc"+(n?' '+"_1hqh":''),s=o&&p?"_468f":'';if(q)return this.$TabBarItem1(r,s);return this.$TabBarItem2(c('joinClasses')(r,s));};l.prototype.componentDidMount=function(){'use strict';this.focus();};l.prototype.componentDidUpdate=function(){'use strict';this.focus();};l.propTypes={wrapper:k.func.isRequired,shouldWrapTab:k.bool,tabIndex:k.oneOf([-1,0]),selected:k.bool,focused:k.bool,hideFocusRing:k.bool,mockSpacebarClick:k.bool};l.defaultProps={wrapper:function(){var m,n;m=babelHelpers.inherits(o,c('React').Component);n=m&&m.prototype;o.prototype.render=function(){'use strict';return c('React').createElement('li',this.props,this.props.children);};function o(){'use strict';m.apply(this,arguments);}return o;}(),shouldWrapTab:true,tabIndex:-1,selected:false,focused:false,hideFocusRing:false,mockSpacebarClick:true};f.exports=l;}),null);
__d('TabBar.react',['cx','fbt','invariant','React','ReactDOM','TabBarItem.react','Event','RTLKeys','BootloadedComponent.react','JSResource','joinClasses','setTimeout','clearTimeout','emptyFunction'],(function a(b,c,d,e,f,g,h,i,j){var k,l;if(c.__markCompiled)c.__markCompiled();var m=c('React').PropTypes,n=i._("Xem th\u00eam");k=babelHelpers.inherits(o,c('React').Component);l=k&&k.prototype;o.getComponent=function(q){'use strict';return q.component;};o.prototype.render=function(){'use strict';return this.props.component;};function o(){'use strict';k.apply(this,arguments);}var p=c('React').createClass({displayName:'TabBar',_blurTimeout:null,propTypes:{activeTabKey:m.string,alwaysShowActive:m.bool,defaultActiveTabKey:m.string,dropdownMenuClassName:m.string,maxTabsVisible:m.number.isRequired,moreLabel:m.string,onTabClick:m.func.isRequired,dropdownTabComponent:m.func.isRequired,onWidthCalculated:m.func.isRequired,shouldCalculateVisibleTabs:m.bool,maxDropdownHeight:m.number},getDefaultProps:function q(){return {alwaysShowActive:true,dropdownTabComponent:c('TabBarItem.react'),maxTabsVisible:Infinity,moreLabel:n,onTabClick:c('emptyFunction').thatReturnsTrue,onWidthCalculated:c('emptyFunction'),shouldCalculateVisibleTabs:true};},getInitialState:function q(){return {activeTabKey:this.props.activeTabKey||this.props.defaultActiveTabKey,focusedTabKey:null,previousFocusedTabKey:null,visibleTabsCount:0,shouldCalculateVisibleTabs:true,hideFocusRing:true};},setWidth:function q(r){c('ReactDOM').findDOMNode(this).style.width=r;this.setState({shouldCalculateVisibleTabs:true});},render:function q(){var r=this.getTabs(),s=r.length,t=this.getActiveTabIndex(),u=r[t],v=this.getActiveTabIndex(true),w,x,y;if(u)w=u.key;var z=this.props.dropdownTabComponent,aa=c('React').createElement(z,{key:'_dropdown',ref:'more',className:"_45hd _2pik"},c('React').createElement('span',{className:"_1b0"},this.props.moreLabel));if(this.state.shouldCalculateVisibleTabs){x=r.map(function(ja,ka){return this._wrapTab(ja,ka,w,null,v,false,false);}.bind(this));if(s>2)x.push(aa);}else{var ba=this._groupTabsByVisibility();x=ba.visibleTabs;y=ba.extraTabs;var ca=this._isDropdownSelected(),da=this.state.visibleTabsCount,ea=this.state.focusedTabKey;ea=ea&&this.getFocusedTabIndex()===-1?p.MORE_TAB_KEY:ea;x=x.map(function(ja,ka){return this._wrapTab(ja,ka,w,ea,v,true,true);}.bind(this));y=y.map(function(ja,ka){return this._wrapTab(ja,ka,w,null,v,true,false);}.bind(this));if(y.length){var fa;if(da===0&&u)fa=u;var ga=fa&&fa.props.children||this.props.moreLabel,ha='_dropdown',ia=c('React').createElement(c('BootloadedComponent.react'),{bootloadLoader:c('JSResource')('TabBarDropdownItem.react').__setRef('TabBar.react'),bootloadPlaceholder:aa,menuClassName:this.props.dropdownMenuClassName,selected:ca,focused:ea===p.MORE_TAB_KEY,hideFocusRing:this.state.hideFocusRing,onMouseDown:this.onMouseDown,onFocus:this.onFocus.bind(this,ha),onBlur:this.onBlur,key:ha,ref:'more',label:ga,tabComponent:this.props.dropdownTabComponent,maxDropdownHeight:this.props.maxDropdownHeight},y);if(da===0){x=ia;}else x.push(ia);}}return (c('React').createElement('ul',babelHelpers['extends']({},this.props,{className:c('joinClasses')(this.props.className,"_43o4"),role:'tablist',onKeyDown:this.onKeyDown,onKeyUp:this.onKeyUp}),x));},componentDidMount:function q(){this.calculateVisibleTabs();this.calculateWidth();},componentWillUnmount:function q(){c('clearTimeout')(this._blurTimeout);},componentWillReceiveProps:function q(r){this.setState({shouldCalculateVisibleTabs:true,activeTabKey:r.activeTabKey||this.state.activeTabKey});},shouldComponentUpdate:function q(r,s){if(this.state.focusedTabKey&&!s.focusedTabKey)return false;if(!this.state.focusedTabKey&&!s.focusedTabKey&&this.state.previousFocusedTabKey&&!s.previousFocusedTabKey)return false;return true;},componentDidUpdate:function q(){if(this.state.shouldCalculateVisibleTabs)this.calculateVisibleTabs();this.calculateWidth();},calculateWidth:function q(){this.props.onWidthCalculated(c('ReactDOM').findDOMNode(this).clientWidth);},calculateVisibleTabs:function q(){var r=this.getTabs(),s=r.length,t=Math.min(s,this.props.maxTabsVisible);if(!this.props.shouldCalculateVisibleTabs){this.setState({visibleTabsCount:t,shouldCalculateVisibleTabs:false});return;}var u=[];for(var v=0;v<s;v++)u.push(c('ReactDOM').findDOMNode(this.refs[v]).offsetWidth);var w=this.getActiveTabIndex();if(this.props.alwaysShowActive&&w!==-1){r.unshift(r.splice(w,1)[0]);u.unshift(u.splice(w,1)[0]);}var x=c('ReactDOM').findDOMNode(this).offsetWidth;t=0;var y=0;for(v=0;v<s;v++){var z=u[v];if(y+z>x){if(t>0&&s>2){var aa=c('ReactDOM').findDOMNode(this.refs.more).offsetWidth;while(t>0&&(y+aa>x||s-t<2)){t--;y-=u[t];}}else t=0;break;}t++;y+=z;}this.setState({visibleTabsCount:Math.min(t,this.props.maxTabsVisible),shouldCalculateVisibleTabs:false});},getActiveTabIndex:function q(){var r=arguments.length<=0||arguments[0]===undefined?false:arguments[0],s=this.state.activeTabKey,t=[];if(r){var u=this._groupTabsByVisibility(),v=u.visibleTabs;t=v;}else t=this.getTabs();return t.findIndex(function(w){return w&&w.key===s;});},getFocusedTabIndex:function q(){var r=this.state.focusedTabKey||this.state.previousFocusedTabKey,s=this._groupTabsByVisibility(),t=s.visibleTabs;return t.findIndex(function(u){return u&&u.key===r;});},getFocusedTab:function q(){var r=this.state.focusedTabKey,s=this._groupTabsByVisibility(),t=s.visibleTabs,u=t.findIndex(function(v){return v&&v.key===r;});return t[u];},onClick:function q(r,event){var s=this.props.onTabClick(r,event);if(s!==false&&this.isMounted())this.activateTab(r);},onMouseDown:function q(){this.setState({hideFocusRing:true});},onKeyDown:function q(event){var r=c('Event').getKeyCode(event);switch(r){case c('RTLKeys').UP:case c('RTLKeys').getRight():case c('RTLKeys').DOWN:case c('RTLKeys').getLeft():var s,t,u,v=this._groupTabsByVisibility(),w=v.visibleTabs,x=r===c('RTLKeys').UP||r===c('RTLKeys').getLeft(),y=x?-1:1,z=x?0:w.length-1,aa=this.getFocusedTabIndex();if(aa===-1&&y===-1)aa=w.length;if(aa===-1){u=null;}else if(aa===z&&y===1){u=p.MORE_TAB_KEY;}else{s=x?Math.max:Math.min;t=s(aa+y,z);u=w[t].key;}if(u)this.setState({focusedTabKey:u,hideFocusRing:false});break;case c('RTLKeys').RETURN:var ba=this.getFocusedTab();if(ba){var ca=ba.key,da=this.props.onTabClick(ca,event);if(da!==false&&this.isMounted())this.activateTab(ca);}break;}},onKeyUp:function q(event){if(c('Event').getKeyCode(event)===c('RTLKeys').TAB&&this.state.hideFocusRing)this.setState({hideFocusRing:false});},onFocus:function q(r,event){c('clearTimeout')(this._blurTimeout);if(r!==this.state.focusedTabKey){this.setState({focusedTabKey:r,previousFocusedTabKey:null});event.preventDefault();event.stopPropagation();}},onBlur:function q(){this.setState({previousFocusedTabKey:this.state.focusedTabKey,focusedTabKey:null});this._blurTimeout=c('setTimeout')(function(){this.setState({previousFocusedTabKey:null});}.bind(this),p.BLUR_TIMEOUT);},_wrapTab:function q(r,s,t,u,v,w,x){!(r.key!==p.MORE_TAB_KEY)?j(0):void 0;var y=t===r.key,z=u===r.key,aa={selected:y,focused:z,tabIndex:y||v===-1&&s===0?0:-1,hideFocusRing:this.state.hideFocusRing};if(w){aa.onClick=this.onClick.bind(this,r.key);aa.onMouseDown=this.onMouseDown;}else aa.mockSpacebarClick=false;if(x){aa.onFocus=this.onFocus.bind(this,r.key);aa.onBlur=this.onBlur;}r=c('React').cloneElement(r,aa);return (c('React').createElement(o,{key:r.key,component:r,ref:s}));},activateTab:function q(r){if(r)this.setState({activeTabKey:r,focusedTabKey:r,shouldCalculateVisibleTabs:true});},getTabs:function q(){var r=[];c('React').Children.forEach(this.props.children,function(s){if(s)r.push(s);});return r;},_groupTabsByVisibility:function q(){var r=this.state.visibleTabsCount,s=this.getTabs(),t=this.getActiveTabIndex(),u,v,w;if(!this.props.alwaysShowActive||t<r||r===0){w=s.slice(r);v=s.slice(0,r);}else{u=s.splice(t,1)[0];var x=r>0?r-1:0;w=s.slice(x);v=s.slice(0,x);v.push(u);}return {visibleTabs:v,extraTabs:w};},_isDropdownSelected:function q(){var r=this.state.visibleTabsCount,s=this.getActiveTabIndex(),t=!this.props.alwaysShowActive&&s>=r||r===0&&s>-1;return t;}});p.MORE_TAB_KEY='_moreTab';p.BLUR_TIMEOUT=120;p.Tab=c('TabBarItem.react');f.exports=p;}),null);
__d('XUIPageNavigationItem.react',['cx','fbt','React','TabBarItem.react','AsyncRequest','joinClasses'],(function a(b,c,d,e,f,g,h,i){var j,k;if(c.__markCompiled)c.__markCompiled();var l=c('React').PropTypes;j=babelHelpers.inherits(m,c('React').Component);k=j&&j.prototype;function m(){var n,o;'use strict';for(var p=arguments.length,q=Array(p),r=0;r<p;r++)q[r]=arguments[r];return o=(n=k.constructor).call.apply(n,[this].concat(q)),this.onClick=function(s,event){if(this.props.ajaxify&&this.props.rel==='async')new (c('AsyncRequest'))(this.props.ajaxify).send();if(this.props.onClick)return this.props.onClick(s,event);return true;}.bind(this),o;}m.prototype.render=function(){'use strict';var n="_5vwz"+(this.props.selected?' '+"_5vwy":''),o=this.props;if(o.ajaxify&&o.rel==='async'){var p=o,q=p.ajaxify,r=p.rel,s=babelHelpers.objectWithoutProperties(p,['ajaxify','rel']);o=s;o.onClick=this.onClick;}return (c('React').createElement(c('TabBarItem.react'),babelHelpers['extends']({},o,{className:c('joinClasses')(this.props.className,n)}),c('React').createElement('div',{className:"_4jq5"},this.props.children),c('React').createElement('span',{className:"_13xf"})));};m.propTypes={selected:l.bool};m.defaultProps={selected:false};f.exports=m;}),null);
__d('XUIPageNavigationGroup.react',['React','TabBar.react','XUIPageNavigationItem.react'],(function a(b,c,d,e,f,g){var h,i;if(c.__markCompiled)c.__markCompiled();var j=c('React').PropTypes;h=babelHelpers.inherits(k,c('React').Component);i=h&&h.prototype;k.prototype.componentDidUpdate=function(){'use strict';this.refs.bar.setWidth(this.props.width);};k.prototype.componentDidMount=function(){'use strict';this.refs.bar.setWidth(this.props.width);};k.prototype.render=function(){'use strict';return c('React').createElement(c('TabBar.react'),babelHelpers['extends']({},this.props,{ref:'bar'}),this.props.children);};function k(){'use strict';h.apply(this,arguments);}k.propTypes={moreLabel:j.string,maxTabsVisible:function l(m,n,o){var p=m[n];if(p!=null&&!(typeof p==='number'&&p>=0))return new Error('Invalid `'+n+'` supplied to `'+o+'`, '+'expected positive integer.');},width:j.string};k.defaultProps={maxTabsVisible:Infinity};k.Item=c('XUIPageNavigationItem.react');f.exports=k;}),null);
__d('XUIPageNavigation.react',['csx','cx','invariant','Arbiter','CSS','DOMQuery','Event','LeftRight.react','React','ReactDOM','SubscriptionsHandler','UITinyViewportAction','Vector','ViewportBounds','XUIPageNavigationGroup.react','joinClasses','throttle'],(function a(b,c,d,e,f,g,h,i,j){var k,l;if(c.__markCompiled)c.__markCompiled();var m=c('React').PropTypes,n=15,o='bluebar',p='caret';k=babelHelpers.inherits(q,c('React').PureComponent);l=k&&k.prototype;function q(){var r,s;'use strict';for(var t=arguments.length,u=Array(t),v=0;v<t;v++)u[v]=arguments[v];return s=(r=l.constructor).call.apply(r,[this].concat(u)),this.state={activeTabKey:undefined,leftWidth:null},this.onTabClick=function(w,event){if(this.props.onTabClick){var x=this.props.onTabClick(w,event);if(!x)return x;}if(event.button===0)this.setState({activeTabKey:w});}.bind(this),this.onWidthCalculated=function(w,x){if(w){this.$XUIPageNavigation6=x;}else this.$XUIPageNavigation7=x;}.bind(this),this.$XUIPageNavigation3=function(){var w=this.wrapper.offsetHeight,x=c('ViewportBounds').getTop();this.$XUIPageNavigation4=c('ViewportBounds').addTop(x+w);c('Arbiter').subscribe('page_transition',function(){this.$XUIPageNavigation4.remove();});}.bind(this),this.$XUIPageNavigation2=function(){this.$XUIPageNavigation1.addSubscriptions(c('Event').listen(window,'resize',c('throttle')(this.resizeNavbarGroups,30)));}.bind(this),this.$XUIPageNavigation5=function(){this.$XUIPageNavigation1.addSubscriptions(c('Event').listen(window,'scroll',function(){var w=c('Vector').getScrollPosition().y>this.props.scrollThreshold;if(this.$XUIPageNavigation8===w)return;this.$XUIPageNavigation8=w;c('CSS').conditionClass(c('ReactDOM').findDOMNode(this),"_51j8",w);}.bind(this)));}.bind(this),this.resizeNavbarGroups=function(){if(!this.refs.left)return;var w=c('ReactDOM').findDOMNode(this).clientWidth;if(isNaN(w)||w===0)return;if(!isNaN(this.$XUIPageNavigation7)&&this.refs.right){var x;x=w-this.$XUIPageNavigation7-n;if(this.$XUIPageNavigation7<x)x=this.$XUIPageNavigation7-n;this.setState({rightWidth:x+'px'});}if(!isNaN(this.$XUIPageNavigation6)){var y;y=w-this.$XUIPageNavigation6-n;if(y<this.$XUIPageNavigation6)y=this.$XUIPageNavigation6+n;this.setState({leftWidth:y+'px'});}else if(!this.refs.right)this.setState({leftWidth:w+'px'});}.bind(this),s;}q.prototype.componentDidMount=function(){'use strict';this.$XUIPageNavigation1=new (c('SubscriptionsHandler'))();this.resizeNavbarGroups();this.$XUIPageNavigation2();var r="^.fixed_elem._5vx1";this.wrapper=c('DOMQuery').scry(c('ReactDOM').findDOMNode(this),r)[0];if(this.wrapper){this.$XUIPageNavigation3();this.$XUIPageNavigation1.addSubscriptions(c('UITinyViewportAction').subscribe('change',function(){if(c('UITinyViewportAction').isTiny()){this.$XUIPageNavigation4.remove();}else this.$XUIPageNavigation3();}.bind(this)));}if((this.wrapper||c('DOMQuery').scry(c('ReactDOM').findDOMNode(this),"^._k").length)&&this.props.scrollThreshold!==null)this.$XUIPageNavigation5();};q.prototype.componentWillUnmount=function(){'use strict';this.$XUIPageNavigation1.release();};q.prototype.render=function(){'use strict';var r=this.props.selectedIndicator,s=this.props.size,t="_5vx2"+(s==='small'?' '+"_5vx3":'')+(s==='medium'?' '+"_5vx4":'')+(r===p?' '+"_5vx5":'')+(r===o?' '+"_5vx6":''),u=null;if(r===p){var v=this.props.caretColor;u=(v==='bg-blue'?"_2d2c":'')+(v==='fbui-desktop-wash'?' '+"_4_np":'')+(v==='fbui-desktop-background-light'?' '+"_4_nr":'')+(v==='fbui-red'?' '+"_4_ns":'')+(v==='fbui-green'?' '+"_4_nv":'')+(v==='fbui-desktop-divider-dark'?' '+"_4_nz":'')+(v==='white'?' '+"_5-f":'');}var w=c('joinClasses')(t,u,this.props.className),x=[],y=this.props.activeTabKey||this.state.activeTabKey||this.props.defaultActiveTabKey;c('React').Children.forEach(this.props.children,function(z,aa){if(z===null)return;var ba={onTabClick:this.onTabClick,activeTabKey:y,onWidthCalculated:this.onWidthCalculated.bind(this,aa),ref:aa?'right':'left',key:aa};if(aa===0)ba.width=this.state.leftWidth;x.push(c('React').cloneElement(z,ba));}.bind(this));!(x.length===1||x.length===2)?j(0):void 0;return c('React').createElement('div',{className:w},c('React').createElement(c('LeftRight.react'),{className:"_5vx7",direction:this.props.floatDirection},x));};q.propTypes={selectedIndicator:m.oneOf([p,o]),caretColor:m.oneOf(['bg-blue','fbui-desktop-wash','fbui-desktop-background-light','fbui-red','fbui-green','fbui-desktop-divider-dark','white']),onTabClick:m.func,size:m.oneOf(['small','medium']),scrollThreshold:m.number,floatDirection:m.oneOf(['left','right','both'])};q.defaultProps={selectedIndicator:o,caretColor:'fbui-desktop-wash',size:'medium',scrollThreshold:0,floatDirection:'both'};q.Group=c('XUIPageNavigationGroup.react');q.Item=c('XUIPageNavigationGroup.react').Item;q.Indicator={BlueBar:o,Caret:p};f.exports=q;}),null);
__d('PagesComposerAudiencesConstants',['keyMirror'],(function a(b,c,d,e,f,g){'use strict';if(c.__markCompiled)c.__markCompiled();var h={TABS:c('keyMirror')({TARGETING:null,GATING:null}),ExportToDefaultSpecMap:{age_max:'ageMax',age_min:'ageMin',geo_locations:'geoLocations',relationship_statuses:'relationshipStatuses',education_statuses:'educationStatuses',education_majors:'educationMajors',education_schools:'educationSchools',work_employers:'workEmployers',work_positions:'workPositions'}};f.exports=h;}),null);
__d('XUIPageNavigationShim',['DOMContainer.react','React','isNode'],(function a(b,c,d,e,f,g){var h,i;if(c.__markCompiled)c.__markCompiled();var j=function(){var m=0;return function(){return 'XUIPageNavigationShim-'+m++;};}();function k(m){var n;if(m.children){n=m.children.map(function(p){if(typeof p==='object'&&typeof p.ctor==='function'){return k(p);}else if(c('isNode')(p)){return c('React').createElement(c('DOMContainer.react'),{key:j()},p);}else return p;});if(n.length===1)n=n[0];}var o=m.ctor;return (c('React').createElement(o,babelHelpers['extends']({key:j()},m.props),n));}h=babelHelpers.inherits(l,c('React').Component);i=h&&h.prototype;l.prototype.render=function(){'use strict';return k(this.props);};function l(){'use strict';h.apply(this,arguments);}f.exports=l;}),null);