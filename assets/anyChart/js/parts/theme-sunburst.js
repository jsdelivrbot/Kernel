if(!_.theme_sunburst){_.theme_sunburst=1;(function($){var RT=function(){var a=this.chart.calculationMode();return this.name+("parent-dependent"==a||"parent-independent"==a?"\n"+$.CI(this.value):"")};
$.sa($.fa.anychart.themes.defaultTheme,{sunburst:{animation:{duration:2E3},title:{text:"Sunburst Chart"},interactivity:{selectionMode:"drill-down"},radius:"45%",innerRadius:0,startAngle:0,a11y:{titleFormat:$.VI},center:{fill:"none",stroke:"none"},calculationMode:"ordinal-from-root",tooltip:{enabled:!0,title:!1,separator:!1,titleFormat:$.EI,format:RT},leaves:{enabled:null,normal:{labels:{padding:"10%",hAlign:"end",position:"radial",format:$.EI}}},sort:"none",normal:{fill:$.GI,stroke:"#fff",labels:{adjustFontSize:[!0,
!0],maxFontSize:14,minFontSize:1,padding:[1,"5%",1,"5%"],enabled:!0,hAlign:"center",vAlign:"middle",position:"circular",anchor:"center",fontColor:"#ffffff",format:RT}},hovered:{fill:$.MI,stroke:$.GI,labels:{enabled:null}},selected:{fill:"#333 0.85",stroke:$.GI,labels:{enabled:null}}}});}).call(this,$)}
