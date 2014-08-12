call WaflCliBootstrap.bat
if errorlevel 0 (
    @ECHO Updating the data model...
    php.exe %WAFL_PATH%/Cli/UpdateDataModel.php AppRoot=%~dp0../../ Countries=Country MarketCategories=MarketCategory MarketFacilities=MarketFacility MarketStreetAddresses=MarketStreetAddress OrderStatuses=OrderStatus PaymentStatuses=PaymentStatuses ProductCategories=ProductCategory ShipmentServiceCountries=ShipmentServiceCountry ThirdPartyMarketplaceCategories=ThirdPartyMarketplaceCategory Users.Superclass=\Wafl\Extensions\UserAuth\FunctionalModel\User UserGroups.Superclass=\Wafl\Extensions\UserAuth\FunctionalModel\PersistantUserGroup Sessions.Superclass=\Wafl\Extensions\UserAuth\FunctionalModel\PersistantSession
)