Ext.define('CImeetsExtJS.view.monitorias.Grid' ,{
    extend: 'Ext.grid.Panel',
    alias : 'widget.monitorias-grid',
	id: 'monitoriasGrid',
    iconCls: 'fam film',
	title : 'monitorias',
	store: 'monitorias',
	
	initComponent: function() {
		Ext.apply(this, {
			dockedItems: [{
				xtype: 'toolbar',
				items: [{
					iconCls: 'fam add',
					itemId: 'add',
					text: 'Agregar monitorias',
					action: 'add'
				}]
			},{
				xtype: 'pagingtoolbar',
				dock: 'bottom',
				store: 'monitorias',
				displayInfo: true
			}],

			columns: [{
				header: 'ID',
				hidden:true,
				dataIndex: 'Id_monitorias',
				flex:0
			},{
				header: 'materia',
				flex:2,
				dataIndex: 'materia'
			},{
				header: 'monitor',
				flex:1,
				dataIndex: 'monitor'
			},{
				header: 'fecha',
				flex:0,
				dataIndex: 'fecha'

			},{
				header: 'salon',
				flex:1,
				dataIndex: 'salon'

			}]
        });
		
		this.callParent(arguments);
	}
});
