if (self.CavalryLogger) { CavalryLogger.start_js(["+xCVi"]); }

__d('legacy:popup-resizer',['PopupWindow'],(function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();b.PopupResizer=c('PopupWindow');}),3);
__d('SearchFunnelTypeaheadLogger',['csx','Arbiter','Banzai','DOM','Event','PageEvents','PageTransitions','SubscriptionsHandler','URI'],(function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i='search_funnel',j='search_end_to_end',k={focus:'entrant',render:'results_displayed',keydown:'interaction',select:'search'},l,m={init:function n(o,p){if(!o||!p)return;this._isColdStart=true;this._sampleRates=p;this._core=o.getCore();this._data=o.getData();this._view=o.getView();this._handler=new (c('SubscriptionsHandler'))();this.log=this.log.bind(this);this.onKeydown=this.onKeydown.bind(this);this.onSelect=this.onSelect.bind(this);this.onTypeaheadImpression=this.onTypeaheadImpression.bind(this);this._transitionInProgress=true;this.onTypeaheadImpression();},onTypeaheadImpression:function n(o){this._initTime=this._getInitTime();this.e2eMarkers=[];if(this._transitionInProgress&&c('DOM').scry(document.body,"._4d3w").length===0)this.log('impression',{funnel_path:c('URI').getNextURI().getPath()});this.reset();this._handler.addSubscriptions(this._core.subscribeOnce('focus',this.log),this._view.subscribeOnce('render',this.log),this._view.subscribeOnce('select',this.onSelect));c('Event').listen(this._core.getElement(),'keydown',this.onKeydown);c('PageTransitions').registerHandler(function(){this._transitionInProgress=true;}.bind(this));c('PageTransitions').registerCompletionCallback(this.onTypeaheadImpression);},onKeydown:function n(event){if(!this._sawKeydown){this._sawKeydown=true;this.log('keydown',event);}},onSelect:function n(event,o){o.funnel_data={selected_position:o.selected.globalIndex,selected_type:o.selected.type};if(o.selected.isNullState){o.funnel_data.interaction_type='null_state';}else if(o.selected.isSingleState){o.funnel_data.interaction_type='single_state';}else o.funnel_data.interaction_type='typed';this._endToEndPath=c('URI').getMostRecentURI().path;l=null;c('Arbiter').subscribe('BigPipe/init',function(event,p){if(!p.arbiter)return;var q={arbiter:p.arbiter,event:c('PageEvents').AJAXPIPE_ONLOAD,markers:this.e2eMarkers,init_time:this._initTime,from_path:this._endToEndPath};setTimeout(function(){this.setupE2EPerfLogging(q);}.bind(this),0);}.bind(this));this.log(event,o);},reset:function n(){this._handler.release();this._handler.engage();this._sawKeydown=false;this._transitionInProgress=false;},log:function n(o,p){if(k[o])o=k[o];this.e2eMarkers.push({event:o,time:String(Date.now()-this._initTime)});if(!this._sampleRates[o])return;p=p||{};p.funnel_data=p.funnel_data||{};p.funnel_data.sample_rate=this._sampleRates[o];p.funnel_data.current_event_time=Date.now();if(this._prevTime&&this._prevEvt){p.funnel_data.previous_event_time=this._prevTime;p.funnel_data.previous_event=this._prevEvt;}this._prevTime=p.funnel_data.current_event_time;this._prevEvt=o;c('Banzai').post(i,{funnel_data:p.funnel_data,path:p.funnel_path||c('PageTransitions').getMostRecentURI().getPath(),stage:o},c('Banzai').VITAL);},setupE2EPerfLogging:function n(o){return o.arbiter.subscribeOnce(o.event,function(p){if(l)return;l=true;o.markers.push({event:'end',time:String(Date.now()-o.init_time)});c('Banzai').post(j,{from_path:this._endToEndPath,to_path:c('URI').getNextURI().path,markers:o.markers,cold_start:this._isColdStart},c('Banzai').VITAL);this._isColdStart=false;}.bind(this));},_getInitTime:function n(){if(window.ExitTime)return window.ExitTime;var o=window.performance||window.msPerformance;if(!o||!o.timing)return;return o.timing.navigationStart;}};f.exports=m;}),null);