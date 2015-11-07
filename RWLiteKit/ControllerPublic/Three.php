<?php
/**
 * Class RWLiteKit_ControllerPublic_Three
 */
class RWLiteKit_ControllerPublic_Three extends XenForo_ControllerPublic_Abstract {

    public function actionIndex() {
        return $this->actionView();
    }

    public function actionView() {
        $visitor = XenForo_Visitor::getInstance();
        if (!$visitor->getUserId()) {
            return $this->responseNoPermission();
        }
				else {
				return $this->responseView('RWLiteKit_ViewPublic_Index', 'RWLiteKit_Three'/*, $viewParams*/);
				}
    }

    private function getRWLiteKitModel() {
        return $this->getModelFromCache('RWLiteKit_Model_Default');
    }
}
