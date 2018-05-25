Ext.define('CImeetsExtJS.view.monitores.Window', {
    extend: 'Ext.window.Window',
    alias: 'widget.monitorias-window',
    height: 420,
    width: Ext.getBody().getViewSize().width / 2,
    modal: true,
    title : 'monitorias',
	iconCls: 'fam film',

    initComponent: function() {
        Ext.apply(this, {
            layout: 'border',
            items: [{
                xtype: 'monitorias-form',
				flex: 1,
				region: 'center'
            }],
			
			dockedItems: [{
				xtype: 'toolbar',
				dock: 'bottom',
				items: ['->', {
					iconCls: 'fam cancel',
					text: 'Cancelar',
					scope: this,
					handler: this.close
				},{
					iconCls: 'fam disk',
					text: 'Guardar',
					action: 'save'
				}]
			}]
        });

        this.callParent(arguments);
    }
});