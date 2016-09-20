if (self.CavalryLogger) { CavalryLogger.start_js(["9a1Jp"]); }

__d("PhotoEditorTargetType",[],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports={COMPOSER:"composer",COMMENT:"comment",PAGE_PRODUCT_COMPOSER:"page_product_composer",PROFILE_PIC:"profile_pic"};}),null);
__d("VideoSurveySource",[],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports={EDIT:"edit",INSIGHTS:"insights",LIBRARY:"library",UPLOAD:"upload"};}),null);
__d('AdsGenericFilterFieldConfigUtil',['invariant','AdsGenericFilterField'],(function a(b,c,d,e,f,g,h){'use strict';if(c.__markCompiled)c.__markCompiled();function i(q,r){var s=j(q,r);!s?h(0):void 0;return s;}function j(q,r){for(var s=Object.keys(q||{}),t=Array.isArray(s),u=0,s=t?s:s[typeof Symbol==='function'?Symbol.iterator:'@@iterator']();;){var v;if(t){if(u>=s.length)break;v=s[u++];}else{u=s.next();if(u.done)break;v=u.value;}var w=v,x=q[w];if(x.field.toString()===r.toString())return x;}return null;}function k(q,r){var s=void 0;for(var t=Object.keys(q),u=Array.isArray(t),v=0,t=u?t:t[typeof Symbol==='function'?Symbol.iterator:'@@iterator']();;){var w;if(u){if(v>=t.length)break;w=t[v++];}else{v=t.next();if(v.done)break;w=v.value;}var x=w;s=q[x];if(s.field.name===r||(s.alternativeFieldNames||[]).some(function(y){return y===r;}))return s;}h(0);}function l(q,r){var s=void 0;for(var t=Object.keys(q),u=Array.isArray(t),v=0,t=u?t:t[typeof Symbol==='function'?Symbol.iterator:'@@iterator']();;){var w;if(u){if(v>=t.length)break;w=t[v++];}else{v=t.next();if(v.done)break;w=v.value;}var x=w,y=q[x];if(y.field.name===r){s=y.field.type;break;}}!s?h(0):void 0;return s;}function m(q,r){if(!r)return false;return r.values.some(function(s){return s.field.key===q.key;});}function n(q,r){for(var s=Object.keys(q),t=Array.isArray(s),u=0,s=t?s:s[typeof Symbol==='function'?Symbol.iterator:'@@iterator']();;){var v;if(t){if(u>=s.length)break;v=s[u++];}else{u=s.next();if(u.done)break;v=u.value;}var w=v,x=q[w];if(x.field.name===r)return !!x.isLevelNeeded;}h(0);return false;}function o(q,r,s){var t=j(q,r);if(!t||!t.isLevelNeeded)return r;return new (c('AdsGenericFilterField'))(r.name,r.type,s);}var p={convertFilterFieldToLevel:o,getConfigByDirtyFieldName:k,getConfigByField:i,getConfigByFieldOrNull:j,getTypeByFieldName:l,isFieldInFilterSet:m,isLevelNeeded:n};f.exports=p;}),null);
__d('AdsGenericFilterOperatorConfig',['fbt','AdsGenericFilterOperator'],(function a(b,c,d,e,f,g,h){'use strict';if(c.__markCompiled)c.__markCompiled();var i={AFTER:{shortText:h._("sau"),text:h._("sau"),operator:c('AdsGenericFilterOperator').AFTER},BEFORE:{shortText:h._("tr\u01b0\u1edbc"),text:h._("tr\u01b0\u1edbc"),operator:c('AdsGenericFilterOperator').BEFORE},IN_RANGE:{text:h._("trong kho\u1ea3ng"),operator:c('AdsGenericFilterOperator').IN_RANGE},CONTAIN:{text:h._("bao g\u1ed3m"),operator:c('AdsGenericFilterOperator').CONTAIN},EQUAL:{shortText:h._("="),text:h._("l\u00e0"),operator:c('AdsGenericFilterOperator').EQUAL},GREATER_THAN:{shortText:h._(">"),text:h._("l\u1edbn h\u01a1n"),operator:c('AdsGenericFilterOperator').GREATER_THAN},IN:{text:h._("l\u00e0"),operator:c('AdsGenericFilterOperator').IN},NOT_IN_RANGE:{shortText:h._("kh\u00f4ng ph\u1ea3i"),text:h._("ngo\u00e0i kho\u1ea3ng"),operator:c('AdsGenericFilterOperator').NOT_IN_RANGE},NOT_CONTAIN:{shortText:h._("kh\u00f4ng ph\u1ea3i"),text:h._("kh\u00f4ng bao g\u1ed3m"),operator:c('AdsGenericFilterOperator').NOT_CONTAIN},NOT_IN:{shortText:h._("kh\u00f4ng ph\u1ea3i"),text:h._("kh\u00f4ng ph\u1ea3i l\u00e0"),operator:c('AdsGenericFilterOperator').NOT_IN},NOT_EQUAL:{shortText:h._("kh\u00f4ng ph\u1ea3i"),text:h._("kh\u00f4ng ph\u1ea3i l\u00e0"),operator:c('AdsGenericFilterOperator').NOT_EQUAL},LESS_THAN:{shortText:h._("\u003C"),text:h._("nh\u1ecf h\u01a1n"),operator:c('AdsGenericFilterOperator').LESS_THAN},STARTS_WITH:{shortText:h._("b\u1eaft \u0111\u1ea7u b\u1eb1ng"),text:h._("b\u1eaft \u0111\u1ea7u b\u1eb1ng"),operator:c('AdsGenericFilterOperator').STARTS_WITH},ANY:{shortText:h._("bao g\u1ed3m m\u1ecdi"),text:h._("bao g\u1ed3m m\u1ecdi"),operator:c('AdsGenericFilterOperator').ANY},ALL:{shortText:h._("bao g\u1ed3m t\u1ea5t c\u1ea3"),text:h._("bao g\u1ed3m t\u1ea5t c\u1ea3"),operator:c('AdsGenericFilterOperator').ALL},NONE:{shortText:h._("kh\u00f4ng bao g\u1ed3m"),text:h._("kh\u00f4ng bao g\u1ed3m"),operator:c('AdsGenericFilterOperator').NONE}};f.exports=i;}),null);
__d('BoostedPostDialogButtonWrapper.react',['BoostedPostDialogButton.react','React'],(function a(b,c,d,e,f,g){var h,i;if(c.__markCompiled)c.__markCompiled();var j=c('React').PropTypes;h=babelHelpers.inherits(k,c('React').Component);i=h&&h.prototype;k.prototype.render=function(){'use strict';var l=this.props.data;if(!l)return c('React').createElement('span',null);return (c('React').createElement('div',{id:l.buttonID},c('React').createElement(c('BoostedPostDialogButton.react'),{boostedButtonType:this.props.boostedButtonType,buttonID:l.buttonID,buttonLabel:l.buttonLabel,configData:l.configData,customLinkLabelReact:this.props.customLinkLabelReact,displaySection:l.displaySection,placement:this.props.placement,onUpsellButtonClick:this.props.onUpsellButtonClick,size:this.props.size,showTooltip:l.showTooltip})));};function k(){'use strict';h.apply(this,arguments);}k.propTypes={boostedButtonType:j.string,customLinkLabelReact:j.object,data:j.shape({buttonID:j.string.isRequired,buttonLabel:j.string,configData:j.object.isRequired,displaySection:j.string.displaySection,showTooltip:j.bool}),placement:j.string.isRequired,size:j.string,onUpsellButtonClick:j.func};f.exports=k;}),null);
__d('BUIText.react',['cx','React','XUIText.react','joinClasses'],(function a(b,c,d,e,f,g,h){var i,j;if(c.__markCompiled)c.__markCompiled();var k=c('React').PropTypes;i=babelHelpers.inherits(l,c('React').Component);j=i&&i.prototype;l.prototype.render=function(){'use strict';var m=this.props,n=m.size,o=babelHelpers.objectWithoutProperties(m,['size']),p=(n==='xxlarge'?"_38i9":'')+(n==='xxxlarge'?' '+"_38ia":'');if(n==='xxlarge'||n==='xxxlarge')n='inherit';return (c('React').createElement(c('XUIText.react'),babelHelpers['extends']({},o,{size:n,className:c('joinClasses')(this.props.className,p)}),this.props.children));};function l(){'use strict';i.apply(this,arguments);}l.propTypes={size:k.oneOf(['small','medium','large','xlarge','xxlarge','xxxlarge','inherit']),weight:k.oneOf(['bold','inherit','normal']),display:k.oneOf(['inline','block'])};f.exports=l;}),null);
__d('BUIForm.react',['cx','AdsHelpLink.react','BUIText.react','ClientIDs','React','joinClasses'],(function a(b,c,d,e,f,g,h){'use strict';var i,j,k,l,m,n;if(c.__markCompiled)c.__markCompiled();var o=c('React').PropTypes,p=o.oneOf(['svelt','breathy','snug','taut']),q=o.oneOf(['left','top']);i=babelHelpers.inherits(r,c('React').Component);j=i&&i.prototype;r.prototype.render=function(){var u=c('joinClasses')(this.props.className,"_550r",(this.props.density==='breathy'?"_550s":'')+(this.props.density==='snug'?' '+"_550t":'')+(this.props.density==='svelt'?' '+"_550u":'')+(this.props.density==='taut'?' '+"_550v":'')+(this.props.labelPosition==='top'?' '+"_550w":'')+(this.props.labelPosition==='left'?' '+"_550y":'')+(this.props.labelPosition==='left'?' '+"_3w5n":'')),v=c('React').Children.map(this.props.children,function(w){if(!w)return w;return c('React').cloneElement(w,{density:this.props.density,labelPosition:this.props.labelPosition});}.bind(this));return (c('React').createElement('div',{className:u},v));};function r(){i.apply(this,arguments);}r.propTypes={density:p,labelPosition:q};r.defaultProps={density:'svelt',labelPosition:'left'};k=babelHelpers.inherits(s,c('React').Component);l=k&&k.prototype;s.prototype.render=function(){var u=c('React').Children.map(this.props.children,function(v){if(v)return c('React').cloneElement(v,{density:this.props.density,labelPosition:this.props.labelPosition});return v;}.bind(this));return (c('React').createElement('div',{className:c('joinClasses')(this.props.className,"_5511"+(!!this.props.title?' '+"_5512":''))},c('React').createElement('div',{className:"_5513"},this.props.title),c('React').createElement('div',{className:"_5516"},u)));};function s(){k.apply(this,arguments);}s.propTypes={title:o.string,density:p,labelPosition:q};m=babelHelpers.inherits(t,c('React').Component);n=m&&m.prototype;t.prototype.render=function(){var u=c('ClientIDs').getNewClientID(),v=c('React').Children.map(this.props.children,function(w,x){if(!w)return w;if(typeof w==='string')w=c('React').createElement(c('BUIText.react'),{density:this.props.density,labelPosition:this.props.labelPosition},w);var y={density:this.props.density,labelPosition:this.props.labelPosition};if(x===0)if(w.props&&w.props.id){u=w.props.id;}else y.id=u;return c('React').cloneElement(w,y);}.bind(this));return (c('React').createElement('div',{className:c('joinClasses')(this.props.className,"_5521 clearfix")},c('React').createElement('div',{className:"_5522 _3w5q"},c('React').createElement('label',{onClick:this.props.onClick,htmlFor:u,className:"_5523"+(' '+"_3w5r")+(this.props.labelAlign==='top'?' '+"_5525":'')},this.props.label,this.props.helpText?c('React').createElement(c('AdsHelpLink.react'),{className:"_5526",containerClassName:"_5xg-"},this.props.helpText):null)),c('React').createElement('div',{className:"_5527"},c('React').createElement('div',{className:"_5528"},v),this.props.infoText?c('React').createElement('div',{className:"_5529"},this.props.infoText):null)));};function t(){m.apply(this,arguments);}t.propTypes={label:o.string.isRequired,labelAlign:o.oneOf(['normal','top']),helpText:o.node,infoText:o.node,onClick:o.func,density:p,labelPosition:q};t.defaultProps={labelAlign:'normal'};r.Section=s;r.Element=t;f.exports=r;}),null);
__d('BUIFormSelector.react',['invariant','BUIForm.react','React','XUISelector.react'],(function a(b,c,d,e,f,g,h){'use strict';var i,j;if(c.__markCompiled)c.__markCompiled();var k=c('XUISelector.react').Option;i=babelHelpers.inherits(l,c('React').Component);j=i&&i.prototype;l.prototype.render=function(){var m=this.props,n=m.density,o=babelHelpers.objectWithoutProperties(m,['density']),p=void 0;switch(n){case 'breathy':case 'svelt':p='xlarge';break;case 'snug':p='large';break;case 'taut':p='medium';break;default:void 0;}return (c('React').createElement(c('XUISelector.react'),babelHelpers['extends']({},o,{size:p})));};function l(){i.apply(this,arguments);}l.propTypes=babelHelpers['extends']({},c('XUISelector.react').propTypes,{density:c('BUIForm.react').propTypes.density});l.Option=k;f.exports=l;}),null);
__d("XEventsPromoteURIDataController",["XController"],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/events\/promote\/fetch_button_data\/",{event_id:{type:"String",required:true},action_history:{type:"String",required:true}});}),null);
__d("XEventsUserSettingsUpdateController",["XController"],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/events\/updatesettings\/",{attributes:{type:"StringToStringMap",defaultValue:{}},id:{type:"Int"}});}),null);
__d('EventPromoteActions.react',['ix','cx','fbt','React','ReactLayeredComponentMixin_DEPRECATED','AsyncRequest','BoostedComponentConstants','BoostedComponentStatus','BoostedPostDialogButtonWrapper.react','BoostedPostPlacementOptions','ContextualLayerUpdateOnScroll','EventsActionsLogger','EventPromoteActionsGatingData','Image.react','PopoverMenu.react','XBoostedComponentFetchButtonDataController','XEventsUserSettingsUpdateController','XEventsPromoteURIDataController','XUIAmbientNUX.react','XUIButton.react','ReactXUIMenu','XUIPopoverButton.react','XUISpinner.react','fbglyph'],(function a(b,c,d,e,f,g,h,i,j){'use strict';if(c.__markCompiled)c.__markCompiled();var k=c('ReactXUIMenu').Item,l=c('React').PropTypes,m=c('React').createClass({displayName:'EventPromoteActions',mixins:[c('ReactLayeredComponentMixin_DEPRECATED')],propTypes:{appID:l.string.isRequired,actionHistory:l.string.isRequired,boostedButtonData:l.object,boostedButtonPlacement:l.string,eventID:l.string.isRequired,hasNux:l.bool,nuxSeenCount:l.number,pageID:l.string.isRequired,size:l.oneOf(['small','medium','large','xlarge','xxlarge'])},getInitialState:function n(){var o=this.props.hasNux&&c('EventPromoteActionsGatingData').showPromoteLinkNux,p=null;if(this.props.boostedButtonData!==undefined)p=babelHelpers['extends']({},this.props.boostedButtonData,{placement:this.props.boostedButtonPlacement||c('BoostedPostPlacementOptions').EVENT_UPSELL,boostedButtonType:c('BoostedComponentConstants').BOOSTED_BUTTON_TYPE.VIEW});return {boostButtonData:p,promoteButtonData:null,showNux:o};},componentDidMount:function n(){this._loadBoostButtonData();this._loadPromoteButtonData();},_loadPromoteButtonData:function n(){if(this.state.promoteButtonData)return;var o=c('XEventsPromoteURIDataController').getURIBuilder().setString('event_id',this.props.eventID).setString('action_history',this.props.actionHistory).getURI();new (c('AsyncRequest'))(o).setHandler(function(p){var q={canViewerPromote:p.payload.canViewerPromote,canViewerPromoteTicket:p.payload.canViewerPromoteTicket,canViewerPromoteOnFBTicket:p.payload.canViewerPromoteOnFBTicket,promoteEventURI:p.payload.promoteEventURI,promoteTicketURI:p.payload.promoteTicketURI};this.setState({promoteButtonData:q});}.bind(this)).send();},_loadBoostButtonData:function n(){if(this.state.boostButtonData)return;var o=c('XBoostedComponentFetchButtonDataController').getURIBuilder().setInt('app_id',this.props.appID).setInt('page_id',this.props.pageID).setInt('post_id',this.props.eventID).setString('ref',this.props.boostedButtonPlacement||c('BoostedPostPlacementOptions').EVENT_UPSELL).getURI();new (c('AsyncRequest'))(o).setHandler(function(p){var q={data:{buttonID:p.payload.buttonID,configData:p.payload.configData,displaySection:p.payload.displaySection},placement:p.payload.placement,boostedButtonType:c('BoostedComponentConstants').BOOSTED_BUTTON_TYPE.VIEW};this.setState({boostButtonData:q});}.bind(this)).send();},_onNuxCloseButtonClick:function n(){this.setState({showNux:false});},_getContextRef:function n(){return this.refs.eventPromoteAction;},renderLayers:function n(){if(!this.state.showNux||!this.refs.eventPromoteAction)return {};var o=this.props.nuxSeenCount?this.props.nuxSeenCount+1:1,p=c('XEventsUserSettingsUpdateController').getURIBuilder().setStringToStringMap('attributes',{insights_promote_link_nux_cnt:String(o)}).getURI();new (c('AsyncRequest'))(p).setMethod('post').send();return {nux:c('React').createElement(c('XUIAmbientNUX.react'),{behaviors:{ContextualLayerUpdateOnScroll:c('ContextualLayerUpdateOnScroll')},contextRef:this._getContextRef,onCloseButtonClick:this._onNuxCloseButtonClick,shown:true,alignment:'right',autofocus:false,position:'below',width:'normal'},j._("M\u1edbi: Qu\u1ea3ng c\u00e1o s\u1ef1 ki\u1ec7n c\u1ee7a b\u1ea1n \u0111\u1ebfn nhi\u1ec1u ng\u01b0\u1eddi b\u1ea1n quan t\u00e2m h\u01a1n."))};},_renderMenuItemLabel:function n(o,p,q){var r=null,s=null;switch(o){case 'tickets':r=h("\/images\/assets_DO_NOT_HARDCODE\/fb_glyphs\/ticket_16_bluegray-10.png");s=h("\/images\/assets_DO_NOT_HARDCODE\/fb_glyphs\/ticket_16_white.png");break;case 'events':default:r=h("\/images\/assets_DO_NOT_HARDCODE\/fb_glyphs\/calendar_16_bluegray-10.png");s=h("\/images\/assets_DO_NOT_HARDCODE\/fb_glyphs\/calendar_16_white.png");break;}return (c('React').createElement('div',null,c('React').createElement('div',{className:"_531w"},c('React').createElement(c('Image.react'),{src:r,className:"_t6l"}),c('React').createElement(c('Image.react'),{src:s,className:"_t6m"})),c('React').createElement('div',null,c('React').createElement('div',{className:"_531x"},p),c('React').createElement('div',{className:"_531y"},q))));},_renderBoostButton:function n(){var o=this.state.boostButtonData;if(o===null)return (c('React').createElement(c('XUISpinner.react'),{background:'light',size:'small'}));if(!o.data.configData.context_store_data.is_eligible)return null;return (c('React').createElement('div',{className:this.props.className,ref:'eventPromoteAction'},c('React').createElement(c('BoostedPostDialogButtonWrapper.react'),babelHelpers['extends']({onUpsellButtonClick:this._onPromoteButtonClick},o,{size:this.props.size}))));},_renderPromoteButton:function n(){var o=this.state.promoteButtonData;if(o===null)return (c('React').createElement(c('XUISpinner.react'),{background:'light',size:'small'}));if(!o.canViewerPromote)return c('React').createElement('div',null);var p=null;if(o.canViewerPromoteTicket||o.canViewerPromoteOnFBTicket){var q=j._("Ti\u1ebfp c\u1eadn nhi\u1ec1u ng\u01b0\u1eddi h\u01a1n"),r=j._("Cho m\u1ecdi ng\u01b0\u1eddi bi\u1ebft v\u1ec1 s\u1ef1 ki\u1ec7n c\u1ee7a b\u1ea1n"),s=c('React').createElement(k,{value:c('EventsActionsLogger').Target.PROMOTE_EVENT_ITEM,href:o.promoteEventURI,className:"_531k"},this._renderMenuItemLabel('events',q,r)),t=null,u=null;if(o.canViewerPromoteOnFBTicket){t=j._("B\u00e1n th\u00eam v\u00e9 tr\u00ean Facebook");u=j._("Qu\u1ea3ng c\u00e1o v\u00e9 tr\u00ean s\u1ef1 ki\u1ec7n n\u00e0y");}else{t=j._("T\u0103ng doanh s\u1ed1 b\u00e1n v\u00e9");u=j._("Chuy\u1ec3n m\u1ecdi ng\u01b0\u1eddi \u0111\u1ebfn trang web v\u1ec1 v\u00e9 c\u1ee7a b\u1ea1n");}var v=c('React').createElement(c('ReactXUIMenu'),{onItemClick:this._onPromoteItemClick},s,c('React').createElement(k,{value:c('EventsActionsLogger').Target.PROMOTE_TICKET_ITEM,href:o.promoteTicketURI,className:"_531k"},this._renderMenuItemLabel('tickets',t,u))),w=j._("Qu\u1ea3ng c\u00e1o");p=c('React').createElement(c('PopoverMenu.react'),{onClick:this._onPromoteMenuClick,menu:v,alignh:'right'},c('React').createElement(c('XUIPopoverButton.react'),{haschevron:true,use:'confirm',label:w}));}else p=c('React').createElement(c('XUIButton.react'),{use:'confirm',href:o.promoteEventURI,onClick:this._onPromoteButtonClick,size:this.props.size,label:j._("Qu\u1ea3ng b\u00e1 s\u1ef1 ki\u1ec7n")});return (c('React').createElement('div',{className:this.props.className,ref:'eventPromoteAction'},p));},render:function n(){var o=this._renderBoostButton();if(o)return o;return this._renderPromoteButton();},_onPromoteButtonClick:function n(){c('EventsActionsLogger').log(this.props.eventID,{type:c('EventsActionsLogger').Type.CLICK,target:c('EventsActionsLogger').Target.PROMOTE_EVENT_BUTTON,acontext:{action_history:this.props.actionHistory},extraData:{}});},_onPromoteMenuClick:function n(){c('EventsActionsLogger').log(this.props.eventID,{type:c('EventsActionsLogger').Type.CLICK,target:c('EventsActionsLogger').Target.PROMOTE_EVENT_MENU,acontext:{action_history:this.props.actionHistory},extraData:{}});},_onPromoteItemClick:function n(o,p){c('EventsActionsLogger').log(this.props.eventID,{type:c('EventsActionsLogger').Type.CLICK,target:p.item.getValue(),acontext:{action_history:this.props.actionHistory},extraData:{}});}});f.exports=m;}),null);
__d('DummySearchSource',['AbstractSearchSource'],(function a(b,c,d,e,f,g){var h,i;if(c.__markCompiled)c.__markCompiled();h=babelHelpers.inherits(j,c('AbstractSearchSource'));i=h&&h.prototype;j.prototype.searchImpl=function(k,l,m){'use strict';l([],k);};function j(){'use strict';h.apply(this,arguments);}f.exports=j;}),null);
__d('RegexMatchSearchSource',['AbstractSearchSource','SearchableEntry'],(function a(b,c,d,e,f,g){var h,i;if(c.__markCompiled)c.__markCompiled();h=babelHelpers.inherits(j,c('AbstractSearchSource'));i=h&&h.prototype;function j(k,l,m){'use strict';i.constructor.call(this);this.$RegexMatchSearchSource1=new RegExp(k);this.$RegexMatchSearchSource2=l||'';this.$RegexMatchSearchSource3=m||{};}j.prototype.searchImpl=function(k,l,m){'use strict';if(k&&this.$RegexMatchSearchSource1.test(k)){var n=new (c('SearchableEntry'))({uniqueID:k,title:k,type:this.$RegexMatchSearchSource2,auxiliaryData:babelHelpers['extends']({},this.$RegexMatchSearchSource3,{isRegexEntry:true})});l([n],k);return;}l([],k);};f.exports=j;}),null);
__d("XStickerPhotoEditorController",["XController"],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/photos\/editor\/sticker_editor\/",{grid_id:{type:"String"},feedback_id:{type:"String"},target_type:{type:"Enum",required:true,enumType:1},photo_fbid:{type:"Int",required:true},latest_fbid:{type:"Int"},initial_tab:{type:"Enum",enumType:1},encrypted_photo_id:{type:"String"}});}),null);
__d("XVideoManagerSurveyController",["XController"],(function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/video\/manager\/survey\/",{page_id:{type:"Int"},source:{type:"Enum",enumType:1}});}),null);