sap.ui.define([
	"sap/ui/core/mvc/Controller",
	"sap/ui/core/UIComponent",
	"sap/ui/core/routing/History",
	"sap/ui/model/json/JSONModel"
], function (Controller, UIComponent, History, JSONModel) {
	"use strict";

	return Controller.extend("opensap.movies.controller.Detail", {

		onInit: function () {
			UIComponent.getRouterFor(this).getRoute("Detail").attachPatternMatched(this._onDetailMatched, this);
		},

		_onDetailMatched: function (oEvent) {
			var oView = this.getView(),
				sMovieIndex = oEvent.getParameter("arguments")["movieId"],
				sAppointmentIndex = oEvent.getParameter("arguments")["appointmentId"];
				
			oView.bindElement({
				path: "/movies/" + sMovieIndex + "/appointments/" + sAppointmentIndex,
				model: "movies",
				events: {
					change: this._onBindingChange.bind(this)
				}
			});
		},
		
		_onBindingChange: function () {
			var oView = this.getView(),
				oElementBinding = oView.getElementBinding("movies"),
				sPath = oElementBinding.getPath();
				
			if(!oView.getModel("movies").getObject(sPath)) {
				UIComponent.getRouterFor(this).getTargets().display("NotFound");
			}
		},
		
		onNavBack: function () {
				UIComponent.getRouterFor(this).navTo("Home");
		}

	});

});















