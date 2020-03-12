<?php

declare(strict_types=1);

namespace THXC;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

//FormAPI Stuff
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class OnJoinUI extends PluginBase implements Listener {
	
	public function onEnable()
	{
        	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        	$this->getLogger()->info("§adotDotDOT Enabled!");
        	$this->saveResource("config.yml");
 	
		$this->FormAPI = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        	if (!$this->FormAPI or $this->FormAPI->isDisabled())
	{
        	$this->getLogger()->warning("§cPlugin FormAPI not found, disabling JoinUI...");
        	$this->getLogger()->warning("§ePlease install FormAPI - Download HERE: poggit.pmmp.io/p/FormAPI");
        	$this->getServer()->getPluginManager()->disablePlugin($this);
        }
	}
	
	public function onDisable
	{
		$this->getLogger()->info("§cdotDotDOT Disabled!")
	}
		
	public function onJoin(CommandSender $sender, PlayerJoinEvent $event)
	{
	if ($this->getConfig()->get("verification-ui") == "true") {
           //$playr = $event->getPlayer();
		$form->sendToPlayer($sender);
	}	
	
	public function mainFrom($player)
	{
	    $form = new SimpleForm(function (Player $player, $data){
		$result = $data;
		if($result === null) {
		   return true;
		}
			switch($result){
				case 0:
				break;
			}
		});					
		$form->setTitle($this->getConfig()->get("Title"));
		$form->setContent($this->getConfig()->get("Content"));
		$form->addButton($this->getConfig()->get("Button"));
		$form->sendToPlayer($sender);
		return true;
	}
}