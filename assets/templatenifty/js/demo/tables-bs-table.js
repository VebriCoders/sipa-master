$(document).on('nifty.ready',function(){jQuery.fn.bootstrapTable.defaults.icons={paginationSwitchDown:'demo-pli-arrow-down',paginationSwitchUp:'demo-pli-arrow-up',refresh:'demo-pli-repeat-2',toggle:'demo-pli-layout-grid',columns:'demo-pli-check',detailOpen:'demo-psi-add',detailClose:'demo-psi-remove'}
$('#demo-editable').bootstrapTable({idField:'id',url:'data/bs-table.json',columns:[{field:'id',formatter:'invoiceFormatter',title:'Invoice'},{field:'name',title:'Name',editable:{type:'text'}},{field:'date',title:'Order date'},{field:'amount',title:'Amount',editable:{type:'text'}},{field:'status',align:'center',title:'Status',formatter:'statusFormatter'},{field:'track',title:'Tracking Number',editable:{type:'text'}}]});$.fn.editableform.buttons='<button type="submit" class="btn btn-primary editable-submit">'+
'<i class="fa fa-fw fa-check"></i>'+
'</button>'+
'<button type="button" class="btn btn-default editable-cancel">'+
'<i class="fa fa-fw fa-times"></i>'+
'</button>';var $table=$('#demo-custom-toolbar'),$remove=$('#demo-delete-row');$table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table',function(){$remove.prop('disabled',!$table.bootstrapTable('getSelections').length);});$remove.click(function(){var ids=$.map($table.bootstrapTable('getSelections'),function(row){return row.id});$table.bootstrapTable('remove',{field:'id',values:ids});$remove.prop('disabled',true);});});function invoiceFormatter(value,row){return '<a href="#" class="btn-link" > Order #'+value+'</a>';}
function nameFormatter(value,row){return '<a href="#" class="btn-link" > '+value+'</a>';}
function dateFormatter(value,row){var icon=row.id%2===0?'fa-star':'fa-user';return '<span class="text-muted"><i class="fa fa-clock-o"></i> '+value+'</span>';}
function statusFormatter(value,row){var labelColor;if(value=="Paid"){labelColor="success";}else if(value=="Unpaid"){labelColor="warning";}else if(value=="Shipped"){labelColor="info";}else if(value=="Refunded"){labelColor="danger";}
var icon=row.id%2===0?'fa-star':'fa-user';return '<div class="label label-table label-'+labelColor+'"> '+value+'</div>';}
function trackFormatter(value,row){if(value)return '<i class="fa fa-plane"></i> '+value;}
function priceSorter(a,b){a=+a.substring(1);b=+b.substring(1);if(a>b)return 1;if(a<b)return-1;return 0;}