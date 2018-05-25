Ext.define('CImeetsExtJS.view.monitores.Grid' ,{
    extend: 'Ext.grid.Panel',
    alias : 'widget.monitores-grid',
	id: 'monitoresGrid',
    iconCls: 'fam film',
	title : 'monitores',
	store: 'monitores',
	
	initComponent: function() {
		Ext.apply(this, {
			dockedItems: [{
				xtype: 'toolbar',
				items: [{
					iconCls: 'fam add',
					itemId: 'add',
					text: 'Agregar monitores',
					action: 'add'
				}]
			},{
				xtype: 'pagingtoolbar',
				dock: 'bottom',
				store: 'monitores',
				displayInfo: true
			}],

			columns: [{
				header: 'ID',
				hidden:true,
				dataIndex: 'Id_monitor',
				flex:0
			},{
				header: 'nombres',
				flex:2,
				dataIndex: 'nombres'
			},{
				header: 'apellidos',
				flex:1,
				dataIndex: 'apellidos'
			},{
				header: 'programa',
				flex:0,
				dataIndex: 'programa'

			},{
				header: 'semestre',
				flex:1,
				dataIndex: 'semestre'

			},{
				header: 'cedula',
				flex:2,
				dataIndex: 'cedula'

			},{
				header: 'email',
				flex:0,
				dataIndex: 'email'
			}]
        });
		
		this.callParent(arguments);
	}
});
