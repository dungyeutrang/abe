if (self.CavalryLogger) { CavalryLogger.start_js(["4qmsI"]); }

__d('DataCollector',['PerformanceStats','Env','ErrorUtils','JSLogger','LogHistory','MessagingBugReportStateUtils','ModuleDependencies','URI','UserActionHistory','performance'],(function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h={};Object.assign(h,{_metadata:{},_logs:{},addMetadata:function i(j){Object.assign(h._metadata,j);},addLog:function i(j,k){h._logs[j]=k;},getMetadata:function i(){return h._metadata;},_collectData:function i(){return {logs:h._collectLogs(),metadata:h._collectMetadata()};},_collectMetadata:function i(){h.addMetadata({URI:c('URI').getRequestURI().toString(),UserAgent:navigator.userAgent,ScriptPaths:h.getPageHistory()});return h._metadata;},_collectLogs:function i(){h.addLog('cavalryid',h.getCavalryID());h.addLog('pageletperformance',c('PerformanceStats').getPageletStats());h.addLog('browser_performance',this._getBrowserPerformanceLogs());var j={};if(c('JSLogger').getDumpJSON){j=c('JSLogger').getDumpJSON();}else if(c('JSLogger').getEntries)j={log:c('JSLogger').getEntries(),now:Date.now(),env_start:c('Env').start};var k={Env:JSON.stringify(c('Env')),ClickHistory:c('UserActionHistory').getHistory(),errors:c('ErrorUtils').history,ScriptPaths:h.getPageHistory(),ModuleDependencies:c('ModuleDependencies').getNotLoadedModules()};Object.assign(j,k);h.addLog('jslogger',j);if(c('LogHistory').getEntries().length>0)h.addLog('Log History',c('LogHistory').formatEntries(c('LogHistory').getEntries()));try{h.addLog('messenger_state',c('MessagingBugReportStateUtils').getStateSnapshot());}catch(l){}return h._logs;},_getBrowserPerformanceLogs:function i(){if(!c('performance').getEntriesByType)return null;var j=c('performance').getEntriesByType('resource').slice(-500).map(function(k){return {startTime:k.startTime,redirectStart:k.redirectStart,redirectEnd:k.redirectEnd,fetchStart:k.fetchStart,duration:k.duration,domainLookupStart:k.domainLookupStart,domainLookupEnd:k.domainLookupEnd,connectStart:k.connectStart,connectEnd:k.connectEnd,requestStart:k.requestStart,responseStart:k.responseStart,responseEnd:k.responseEnd,entryType:k.entryType,initiatorType:k.initiatorType,name:k.name,transferSize:k.transferSize};});return JSON.stringify(j);},getPageHistory:function i(){return [b._script_path];},getCavalryID:function i(){if(b.CavalryLogger){var j=b.CavalryLogger.getInstance();if(j)return j.lid;}return null;},reset:function i(){h._logs={};h._metadata={};}});f.exports=h;}),null);