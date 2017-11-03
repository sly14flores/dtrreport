<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>

<body>

</body>
<script src="jquery-3.1.1.min.js"></script>
<script src="jspdf.min.js"></script>
<script src="jspdf.plugin.autotable.js"></script>

<script type="text/javascript">

(function(API){
    API.myText = function(txt, options, x, y, col2 = false) {
        options = options ||{};
        /* Use the options align property to specify desired text alignment
         * Param x will be ignored if desired text alignment is 'center'.
         * Usage of options can easily extend the function to apply different text 
         * styles and sizes 
        */
        if( options.align == "center" ){
            // Get current font size
            var fontSize = this.internal.getFontSize();

            // Get page width
            // var pageWidth = this.internal.pageSize.width;
            var pageWidth = 306;

            // Get the actual text's width
            /* You multiply the unit width of your string by your font size and divide
             * by the internal scale factor. The division is necessary
             * for the case where you use units other than 'pt' in the constructor
             * of jsPDF.
            */
            txtWidth = this.getStringUnitWidth(txt)*fontSize/this.internal.scaleFactor;

            // Calculate text's x coordinate
            x = ( pageWidth - txtWidth ) / 2;
			if (col2) x += pageWidth;
        }

        // Draw text at x,y
        this.text(txt,x,y);
    }
})(jsPDF.API);

	$(function() {	
		
var doc = new jsPDF({
			orientation: 'portrait',
			unit: 'pt',
			format: [792, 612]
		  });

var columns = [
    {title: "Day", dataKey: "day"},
    {title: "Time In", dataKey: "morning_in"},
    {title: "Time Out", dataKey: "morning_out"},
    {title: "Time In", dataKey: "afternoon_in"},
    {title: "Time Out", dataKey: "afternoon_out"},
    {title: "Tardiness", dataKey: "tardiness"}
];

var rows = [
    {"day": "1", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "2", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "3", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "4", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "5", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "6", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "7", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "8", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "9", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "10", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "11", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "12", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "13", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "14", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "15", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "16", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "17", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "18", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "19", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "20", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "21", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "22", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "23", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "24", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "25", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "26", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "27", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "28", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "29", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "30", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""},
    {"day": "31", "morning_in": "08:00:00", "morning_out": "", "afternoon_in": "", "afternoon_out": "", "tardiness": ""}
];

// Cut lengthwise
doc.setDrawColor(225,225,225);
doc.line(306,0,306,792);

doc.setFontSize(10);
doc.setTextColor(40,40,40);
doc.text(103, 20, 'Municipality of San Juan');

// Line
doc.setDrawColor(100,100,100);
doc.line(23,40,283,40);

doc.setFontSize(13);
doc.setTextColor(20,20,20);
doc.text(90, 55, 'DAILY TIME RECORD');

// Name
doc.setFontSize(10);
doc.setTextColor(40,40,40);
doc.myText("Sylvester B. Flores",{align: "center"},0,83);

// Line
doc.setDrawColor(100,100,100);
doc.line(23,87,283,87);

// (Name)
doc.setFontSize(8);
doc.setTextColor(100,100,100);
doc.myText("(Name)",{align: "center"},306,95);

// For the month of
doc.setFontType('italic');
doc.setTextColor(80,80,80);
doc.text(25, 110, 'For the month of: ');

// Office Hours
doc.text(25, 122, 'Office Hours for arrival: ');

// Regular days
doc.text(190, 122, 'Regular days: ');

// Saturdays
doc.text(190, 134, 'Saturdays: ');

// I CERTIFY
doc.setFontType('normal');
doc.text(45, 650, "I CERTIFY on my hour that the above's a true and correct report");
doc.text(25, 663, "of the hour of work performed, record of which was made daily at the");
doc.text(25, 676, "time of arrival at and departure from office.");

// Line
doc.setDrawColor(100,100,100);
doc.line(23,700,283,700);

// Verified
doc.text(25, 710, "Verified as to the prescribed office hours");

// Line
doc.setDrawColor(100,100,100);
doc.line(50,745,260,745);

// In Charge
doc.setFontSize(10);
doc.myText("In Charge",{align: "center"},306,755);

doc.autoTable(columns, rows, {
	// tableLineColor: [189, 195, 199],
	// tableLineWidth: 0.75,
	margins: {top: 140, left: 23},
	tableWidth: 260,
	columnStyles: {
		day: {columnWidth: 30},
		morning_in: {columnWidth: 45},
		morning_out: {columnWidth: 45},
		afternoon_in: {columnWidth: 45},
		afternoon_out: {columnWidth: 45},
		tardiness: {columnWidth: 50}
	},
	styles: {
		lineColor: [75, 75, 75],
		lineWidth: 0.50,
		cellPadding: 3
	},
	headerStyles: {
		halign: 'center',		
		fillColor: [191, 191, 191],
		textColor: 50,
		fontSize: 8
	},
	bodyStyles: {
		halign: 'center',
		fillColor: [255, 255, 255],
		textColor: 50,
		fontSize: 8
	},
	alternateRowStyles: {
		fillColor: [255, 255, 255]
	}
});

var blob = doc.output("blob");
window.open(URL.createObjectURL(blob));
		
	});

</script>

</html>