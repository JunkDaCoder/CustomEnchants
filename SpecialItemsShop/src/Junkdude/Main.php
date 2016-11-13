<?php

namespace Junkdude;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as c;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Item\Item;
use pocketmine\Player;
use pocketmine\Server;


class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getLogger()->notice(c::AQUA . "SpecialItems Shop Enabled!");
  }
  public function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
      if($cmd->getName() == "buy_zaroc"){//COMMAND #1
        $player = $this->getServer()->getPlayer($sender->getName());
        $item1 = Item::get(Item::DIAMOND_SWORD, 0, 1);
        $itemname1 = $item1->setCustomName("Za Roc");
        $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
		if($money < 2500)
		{
			$sender->sendMessage(c::RED ."Not Enough Money!");
		}else{
			$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 1500);
			$sender->getInventory()->addItem($item1);
			$sender->sendMessage(c::GREEN . "Za Roc Has Been Bought!");
		    $item1->setCustomName($itemname1);
		}
	}

	if($cmd->getName() == "buy_snakes_blade"){//COMMAND #1
        $player = $this->getServer()->getPlayer($sender->getName());
        $item2 = Item::get(Item::DIAMOND_SWORD, 0, 1);
        $itemname2 = $item1->setCustomName("Snakes Blade");
        $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
		if($money < 2500)
		{
			$sender->sendMessage(c::RED ."Not Enough Money!");
		}else{
			$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 1500);
			$sender->getInventory()->addItem($item2);
			$sender->sendMessage(c::GREEN . "Snakes Blade Has Been Bought!");
		    $item1->setCustomName($itemname2);
		}
	}
}
}