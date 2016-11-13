<?php

namespace CustomEnchantments;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\entity\{EntityArmorChangeEvent, EntityDamageByEntityEvent, EntityDamageEvent};
use pocketmine\event\player\PlayerDeathEvent;


use pocketmine\utils\TextFormat as c;
use pocketmine\level\sound\GhastSound;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\level\sound;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\Server;

use pocketmine\entity\Effect;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\sound\ExplodeSound;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getLogger()->notice(c::AQUA . "CustomEnchantments Have Been Enabled!");
  }
    public function onDamage(EntityDamageEvent $e) {
        if ($e instanceof EntityDamageByEntityEvent) {
        $damager = $e->getDamager();
        
        $p = $e->getEntity();
        $thing = $damager->getInventory()->getItemInHand();
        if ($thing->getId() === 276 and $thing->getCustomName() === "Snakes Blade") {
           switch (mt_rand(1,5)) {
                case 1:
                    return;
                case 2:
                    return;
                case 3:
                    return;
                case 4:
                    return;
                case 5:
                    $p->addEffect(Effect::getEffect(19)->setDuration(20)->setAmplifier(1));
        }
        } 
        if ($thing->getId() === 276 and $thing->getCustomName() === "Za Roc") {
        	$x = $p->getX();
			$y = $p->getY();
			$z = $p->getZ();
            $level = $damager->getLevel();
            $damager = $e->getDamager();
              $p = $e->getEntity();
        	switch (mt_rand(1,3)) {
                case 1:
                $level->addParticle(new FlameParticle(new Vector3($x, $y + 1, $z)));
                $level->addSound(new ExplodeSound(new Vector3($x, $y + 1, $z)));
                $damager->sendMessage(c::RED . "Explosive Hit!");
                $p->setHealth(15);
                case 2:
                return;
                case 3:
                    $p->addEffect(Effect::getEffect(20)->setDuration(13 * 20)->setAmplifier(1));
        	        $level->addSound(new GhastSound(new Vector3($x, $y + 1, $z)));
        	        $damager->sendMessage(c::RED . "You have unleashed the forces of evil upon your enemy");
        	    }
        	}
        }
    }
}