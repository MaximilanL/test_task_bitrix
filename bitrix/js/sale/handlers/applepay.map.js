{"version":3,"sources":["applepay.js"],"names":["BX","namespace","Sale","PaymentApplePay","STATUS_SUCCESS","STATUS_FAILURE","init","parameters","this","ajaxUrl","salePaySystemWrapperNode","salePaySystemWrapperId","paymentButtonNode","paymentButtonId","paymentButtonWrapperNode","paymentButtonWrapperId","params","message","isApplePayAvailable","showApplePayButton","initApplePayPayment","showNotAvailableMessage","bindEvents","bind","proxy","makePayment","createPaymentRequest","methodData","supportedMethods","SUPPORTED_METHOD","data","version","merchantIdentifier","MERCHANT_ID","merchantCapabilities","MERCHANT_CAPABILITIES","supportedNetworks","countryCode","COUNTRY_CODE","currencyCode","CURRENCY","paymentDetails","total","label","DISPLAY_NAME","amount","value","TOTAL_SUM","currency","displayItems","ORDER_TITLE","ORDER_ID","paymentOptions","requestPayerName","requestPayerEmail","requestPayerPhone","requestShipping","PaymentRequest","window","ApplePaySession","canMakePayments","request","canMakePayment","then","result","catch","style","display","messageNode","document","createElement","innerHTML","PAY_SYSTEM_NOT_AVAILABLE","classList","add","appendChild","onmerchantvalidation","event","sessionPromise","fetchPaymentSession","validationURL","complete","show","response","processPayment","err","alert","ERROR_MESSAGE","postData","PAYMENT_ID","PAYSYSTEM_ID","action","GET_SESSION_ACTION","url","displayName","initiativeContext","DOMAIN_NAME","send","MAKE_PAYMENT_ACTION","paymentData","JSON","stringify","details","token","showSuccessfulTemplate","error","showErrorTemplate","Promise","resolve","reject","ajax","method","dataType","onsuccess","status","Error","errors","join","onfailure","successfulBlock","PAYMENT_APPROVED","PAID_MESSAGE","errorMessage","errorBlock"],"mappings":"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","file":"applepay.map.js"}