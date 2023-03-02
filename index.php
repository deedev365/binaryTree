<?php

class Node
{
	public $value;
	public $left  = null;
	public $right = null;

	public function __construct ($value)
	{
		$this->value = $value;
	}
}

class Tree
{
	protected $root = null;

	public function isEmpty(): bool
	{
		return is_null($this->root);
	}

	public function insert($value): void
	{
		$node = new Node($value);
		$this->insertNode($node, $this->root);
	}

	protected function insertNode(Node $node, &$subtree): self
	{
		if (is_null($subtree)) { 
			$subtree = $node; 
		}
		else {
			if ($node->value < $subtree->value) {
				$this->insertNode($node, $subtree->left);
			}
			elseif ($node->value > $subtree->value) {
				$this->insertNode($node, $subtree->right);
			}
		}
		
		return $this;
	}
}

$tree = new Tree();
$tree->insert(1);
$tree->insert(2);
$tree->insert(3);

var_dump($tree);
