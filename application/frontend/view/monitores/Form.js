Ext.define('CImeetsExtJS.view.monitores.Form', {
	extend: 'Ext.form.Panel',
    alias : 'widget.monitores-form',
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
				name : 'Id_monitor',
				fieldLabel: 'Id_monitor',
				hidden:true,
				allowBlank: true
			},{
				xtype: 'textfield',
				name : 'nombres',
				fieldLabel: 'nombres'
			},{
				xtype: 'textfield',
				name : 'apellidos',
				fieldLabel: 'apellidos'
			},{
				xtype: 'textfield',
				name : 'programa',
				fieldLabel: 'programa'

			},{
				xtype: 'textfield',
				name : 'semestre',
				fieldLabel: 'semestre'
			},{
				
				xtype: 'numberfield',
				allowNegative:false,
				allowDecimals:false,
				maxValue:2050,
				minValue:1900,
				fieldLabel: 'cedula',
				name:'cedula'

			},{
				xtype: 'textfield',
				name : 'email',
				fieldLabel: 'email'
			}]
	    });
	

        this.callParent(arguments);
    }
});
