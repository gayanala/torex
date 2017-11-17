/**
 * Filter a column on a specific date range. Note that you will likely need
 * to change the id's on the inputs and the columns in which the start and
 * end date exist.
 *
 *  @name Date range filter
 *  @summary Filter the table based on two dates in different columns
 *  @author _guillimon_
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').DataTable();
 *
 *        // Add event listeners to the two range filtering inputs
 *        $('#min').keyup( function() { table.draw(); } );
 *        $('#max').keyup( function() { table.draw(); } );
 *    } );
 */

$.fn.dataTableExt.afnFiltering.push(
    function (oSettings, aData, iDataIndex) {
        var dateStart = document.getElementById('dateStart').value;
        var dateEnd = document.getElementById('dateEnd').value;
        var evalDate = parseDateValue(aData[4]);

        if (dateStart === "" && dateEnd === "") {
            return true;
        }
        else if (dateStart <= evalDate && dateEnd === "") {
            return true;
        }
        else if (dateEnd >= evalDate && dateStart === "") {
            return true;
        }
        else if (dateStart <= evalDate && dateEnd >= evalDate) {
            return true;
        }
        return false;
    }
);

// Function for converting a mm/dd/yyyy date value into a numeric string for comparison (example 08/12/2010 becomes 20100812
function parseDateValue(rawDate) {
    var dateArray = rawDate.split("/");
    var parsedDate = dateArray[2] + "-" + dateArray[0] + "-" + dateArray[1];
    return parsedDate;
}
