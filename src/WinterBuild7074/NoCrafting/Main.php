<?php
namespace WinterBuild7074\NoCrafting;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
	}

	public function onTouch(PlayerInteractEvent $event) {
		$block = $event->getBlock();
		$blocklevel = $block->getLevel()->getName();
		$blockedcrafting = $this->getConfig()->get("BlockedCrafting");
		if($block->getId() === 58) {
			if(in_array($blocklevel, $blockedcrafting)) {
				$event->setCancelled();
			}
		}
	}
}
