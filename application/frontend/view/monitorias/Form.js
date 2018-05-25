Ext.define('CImeetsExtJS.view.monitorias.Form', {
	extend: 'Ext.form.Panel',
    alias : 'widget.monitorias-form',
    border : false,
	bodyPadding : 10,

   initComponent: function() {
	   Ext.apply(this, {
			fieldDefaults: {
				anchor: '100%',
				labelAlign: 'left',
				allowBlank: false,
				combineErrors: true,
				msgTarget: 'side'
			},
	
			items: [{
				xtype: 'textfield',
				name : 'Id_monitorias',
				fieldLabel: 'Id_monitorias',
				hidden:true,
				allowBlank: true
			},{
				xtype: 'textfield',
				name : 'materia',
				fieldLabel: 'materia'
			},{
				xtype: 'textfield',
				name : 'monitor',
				fieldLabel: 'monitor'
			},{
				xtype: 'textfield',
				name : 'fecha',
				fieldLabel: 'fecha'

			},{
				xtype: 'textfield',
				name : 'salon',
				fieldLabel: 'salon'
		
			}]
	    });
	

        this.callParent(arguments);
    }
});
