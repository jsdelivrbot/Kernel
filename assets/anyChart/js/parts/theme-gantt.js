if(!_.theme_gantt){_.theme_gantt=1;(function($){$.sa($.fa.anychart.themes.defaultTheme,{defaultDataGrid:{isStandalone:!0,headerHeight:25,backgroundFill:"none",columnStroke:"#cecece",rowHoverFill:$.GI,rowSelectedFill:$.GI,rowStroke:"#cecece",rowOddFill:"#fff",rowEvenFill:"#fff",rowFill:"#fff",onEditStart:function(){return 1>this.columnIndex?{cancelEdit:!0}:{value:this.value}},onEditEnd:function(){return 1==this.columnIndex?{itemMap:{name:this.value}}:{cancelEdit:!0}},buttons:{padding:[0,0,0,0],width:15,height:15,cursor:"pointer",normal:{hAlign:"center",
vAlign:"middle",fontColor:"#7c868e",fontSize:12,content:"+"},hovered:{},selected:{content:"-"}},zIndex:5,headerFill:"#f7f7f7",tooltip:{padding:5,title:{enabled:!0,fontSize:"14px",fontWeight:"normal",fontColor:"#e5e5e5"},separator:{enabled:!0},format:"{%name}"},defaultColumnSettings:{width:90,buttonCursor:"pointer",labels:{enabled:!0,wordBreak:"break-all",anchor:"left-top",vAlign:"middle",padding:{top:0,right:5,bottom:0,left:5},background:null,fontSize:11,disablePointerEvents:!0},depthPaddingMultiplier:0,
collapseExpandButtons:!1,title:{enabled:!0,margin:0,vAlign:"middle",hAlign:"center",background:{enabled:!1},wordWrap:"normal",wordBreak:"normal"}},columns:[{width:50,labels:{format:"{%linearIndex}"},title:{text:"#"}},{width:170,collapseExpandButtons:!0,depthPaddingMultiplier:15,labels:{format:"{%name}"},title:{text:"Name"}}]},defaultTimeline:{isStandalone:!0,columnStroke:"#cecece",backgroundFill:"none",rowHoverFill:$.GI,rowSelectedFill:$.GI,rowStroke:"#cecece",rowOddFill:"#fff",rowEvenFill:"#fff",
rowFill:"#fff",zIndex:5,headerHeight:70,elements:{anchor:"auto",position:"left-center",offset:0,height:"70%",normal:{fill:$.GI,stroke:$.GI},selected:{fill:$.GI,stroke:$.GI},labels:{enabled:null},rendering:{drawer:function(){$.zB.vector.primitives.roundedRect(this.shapes.path,this.predictedBounds,0)},shapes:[{name:"path",shapeType:"path",zIndex:10,disablePointerEvents:!1}]},edit:{thumbs:{fill:"#eaeaea",stroke:"#545f69",size:3,enabled:!0},connectorThumbs:{fill:"#eaeaea",stroke:"#545f69",size:10,type:"circle",
verticalOffset:0,horizontalOffset:0,enabled:!0},fill:{color:"#fff",opacity:1E-5},stroke:{color:"#aaa",dash:"3 3"},enabled:null}},tasks:{progress:{height:"100%",anchor:"left-center",rendering:{shapes:[{name:"path",shapeType:"path",zIndex:11,disablePointerEvents:!0}]},edit:{fill:"#eaeaea",stroke:"#545f69",enabled:null}}},groupingTasks:{rendering:{drawer:function(){var a=this.predictedBounds,b=a.left+a.width,c=a.top+a.height,d=a.top+1.4*a.height;this.shapes.path.moveTo(a.left,a.top).lineTo(b,a.top).lineTo(b,
d).lineTo(b-1,d).lineTo(b-1,c).lineTo(a.left+1,c).lineTo(a.left+1,d).lineTo(a.left,d).close()}}},milestones:{rendering:{drawer:function(){var a=this.predictedBounds,b=a.width/2;$.zB.vector.primitives.diamond(this.shapes.path,a.left+b,a.top+b,b)}}},baselines:{above:!1},connectors:{previewStroke:{color:"#545f69",dash:"3 3"},normal:{fill:$.GI,stroke:$.GI},selected:{fill:$.GI,stroke:$.GI}},tooltip:{padding:5,title:{enabled:!0,fontSize:"14px",fontWeight:"normal",fontColor:"#e5e5e5"},separator:{enabled:!0},
zIndex:100},labels:{enabled:!0,anchor:"left-center",position:"right-center",padding:{top:3,right:5,bottom:3,left:5},vAlign:"middle",background:null,fontSize:11,zIndex:40,disablePointerEvents:!0},markers:{anchor:"center-top",zIndex:50,type:"star5",fill:"#ff0",stroke:"2 red"},defaultLineMarkerSettings:{layout:"vertical",zIndex:1.5},defaultRangeMarkerSettings:{layout:"vertical",zIndex:1},defaultTextMarkerSettings:{layout:"vertical",zIndex:2},header:{background:{enabled:!1,fill:"#f7f7f7"},fill:"#f7f7f7",
stroke:"#cecece",anchor:"left-top",fontSize:10,vAlign:"middle",holidays:{padding:{}},padding:{top:0,right:5,bottom:0,left:5},disablePointerEvents:!0}},ganttBase:{defaultRowHoverFill:"#f8fafb",defaultRowSelectedFill:"#ebf1f4",splitterPosition:"30%",headerHeight:70,rowStroke:"#cecece",rowHoverFill:$.GI,rowSelectedFill:$.GI,edit:{fill:{color:"#4285F4",opacity:.2},stroke:{color:"#4285F4",thickness:2},placementStroke:{color:"#4285F4",dash:"4 4"},enabled:!1},title:{enabled:!1},legend:{enabled:!1},background:{fill:"#fff"},
margin:0,padding:0,dataGrid:{isStandalone:!1,backgroundFill:"none",tooltip:{zIndex:100}},timeline:{isStandalone:!1,labels:{padding:[0,4,0,4]},header:{enabled:!0,overlay:{enabled:!1},textOverflow:"",stroke:"#ccc",padding:[0,5,0,5],fontSize:10,vAlign:"middle",hAlign:"center",drawTopLine:!1,drawRightLine:!1,drawBottomLine:!1,drawLeftLine:!1}}},ganttResource:{dataGrid:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%start}\nEnd Date: {%end}"}},timeline:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%start}\nEnd Date: {%end}"},
labels:{format:"Progress Label",position:"center",anchor:"center",enabled:!1}}},ganttProject:{dataGrid:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%actualStart}\nEnd Date: {%actualEnd}\nComplete: {%progress}"}},timeline:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%actualStart}\nEnd Date: {%actualEnd}\nComplete: {%progress}"},elements:{labels:{format:"{%Progress}",position:"right-center",anchor:"left-center",enabled:null}},tasks:{progress:{labels:{format:"{%Progress}",enabled:!1}}},
groupingTasks:{progress:{labels:{format:"{%Progress}",enabled:!1}}},baselines:{labels:{position:"right-center",anchor:"left-center",format:"Baseline Label",enabled:!1}},milestones:{labels:{format:"{%Name}",anchor:"left-center",position:"right-center",enabled:null}}}}});
$.sa($.fa.anychart.themes.defaultTheme.standalones,{projectTimeline:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%actualStart}\nEnd Date: {%actualEnd}\nComplete: {%progress}"}},resourceTimeline:{tooltip:{titleFormat:"{%Name}",format:"Start Date: {%start}\nEnd Date: {%end}"}},dataGrid:{enabled:!0,zIndex:0}});}).call(this,$)}
