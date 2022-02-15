<?php
namespace Eike\Couch\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
class MapBoxTileLayerViewHelper extends AbstractViewHelper {

    public function render()
    {
        $id = $this->arguments['id'];
        $accesssToken = $this->arguments['accesssToken'];
        $maxZoom = $this->arguments['maxZoom'];
        $attribution = $this->arguments['attribution'];
        $result = "
              L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	     	  attribution: '$attribution',
	     	  maxZoom: $maxZoom,
	     	  id: '$id',
	     	  accessToken: '$accesssToken'
	     	}).addTo(map);
            ";
        return $result;
    }

    public function initializeArguments(): void
    {
        $this->registerArgument('id', 'string', '', true);
        $this->registerArgument('accesssToken', 'string', '', true);
        $this->registerArgument('maxZoom', 'integer', '', false, 16);
        $this->registerArgument('attribution', 'string', '', false, '');
    }
}
?>