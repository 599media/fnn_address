<?php
namespace Fnn\FnnAddress\Generator;
class Persons implements \Tx_ExtensibleSitemap_Generator_Interface {

    protected $conf = null;
    protected $parent = null;
    protected $cObj = null;

    /**
     * the fields to fetch from the record
     *
     * @var string
     */
    protected $fieldList = 'uid,pid,name,first_name,last_name,tstamp';

    /**
     * timestamp of the current time will be cached here
     * @var integer
     */
    protected $now = null;
    /**
     * the default priority to set will be cached here
     * @var string
     */
    protected $priority = null;

    /**
     * a handle to the database result to fetch the news records from
     *
     * @var unknown_type
     */
    protected $handle = null;

    /**
     * the singlePid will be cached here
     * @var integer
     */
    protected $singlePid = null;

    /**
     * initializes the generator
     *
     * @param array $conf
     * @param \Tx_ExtensibleSitemap_Utility_Config $parent
     * @param null $cObj
     * @return null
     */
    public function init($conf, $parent, $cObj = null) {
        $this->conf = $conf;
        $this->parent = $parent;
        $this->cObj = $cObj;
        $this->language = (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('L')) ? \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('L') : 0;

        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->language);

        $this->now = time();
        $this->priority = $this->conf['defaultPriority'] ? $this->conf['defaultPriority'] : null;
        $this->singlePid = ($this->conf['singlePid']) ? $this->conf['singlePid'] : 0;

        $this->createHandle();
    }

    /**
     * create the database handle for all the desired news records
     *
     * @return null
     */
    protected function createHandle() {
        $pids = isset($this->conf['pid_list']) ? $this->conf['pid_list'] : 0;
        /**
         * the WHERE part of the select query
         * @var string
         */
        $selectWhere =
            (empty($pids) ? '1=1' : 'pid IN (' . $pids . ')').
                'AND sys_language_uid = '.$this->language.
                $this->cObj->enableFields('tx_fnnaddress_domain_model_person')
        ;
        $this->handle = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            $this->fieldList,
            'tx_fnnaddress_domain_model_person',
            $selectWhere,
            ''
        );
    }

    /**
     * closes down the generator
     *
     * @return null
     */
    public function finish(){
        $GLOBALS['TYPO3_DB']->sql_free_result($this->handle);
    }

    /**
     * get the next configuration for a page
     *
     * @return array
     */
    public function getNext() {
        while($news = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($this->handle)) {

            if(!$this->shouldPageBeIndexed($news)) {
                continue;
            }

            return $this->processItem($news);
        }
        return null;
    }

    /**
     * process a single item and return an array with all the generated data
     *
     * @param $item
     */
    protected function processItem($item) {
        $href = $this->cObj->typoLink_URL(array(
            'parameter' => $this->singlePid,
             'additionalParams' => sprintf(
                '&tx_fnnaddress_displaypersons[person]=%d&tx_fnnaddress_displaypersons[action]=show&tx_fnnaddress_displaypersons[controller]=Person',
                $item['uid']
            ),
            'useCacheHash' => true
        ));

        return array(
            'name' => $item['first_name'] . " " . $item['last_name'],
            '_OVERRIDE_HREF' => $href,
            'SYS_LASTCHANGED' => $item['tstamp'],
            'tx_extensiblesitemap_priority' => $this->getPriority($item),
            'tx_extensiblesitemap_frequency' => $this->getFrequency($item)
        );
    }

    /**
     * decides wether a given page should be indexed or not
     *
     * @param $pageInfo
     * @return boolean
     */
    protected function shouldPageBeIndexed($pageInfo) {
        return true;
    }

    /**
     * get the priority for a record
     *
     * @param array $item
     * @return string
     */
    protected function getPriority($item) {
        return $this->priority;
    }

    /**
     * get the frequency to check for changes for a record
     *
     * @param array $item
     * @return string
     */
    protected function getFrequency($item) {
        return \Tx_ExtensibleSitemap_Utility_Config::FREQUENCY_MONTHLY;
    }

    /**
     * get an array of required namespaces if any
     *
     * * return some empty value if no additional XML-Namespaces are required
     * * or return a mixed array, where key is namespace name and value is uris for the dtd
     * * or return an array with numeric keys and the namespace as value -> the dtd is used from a database then
     *
     * @return array
     */
    public function getRequiredNamespaces() {}
}
